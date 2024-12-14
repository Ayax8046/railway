<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Exports\ReservasExport;
use App\Models\Reserva;
use Maatwebsite\Excel\Facades\Excel;

// CLASE QUE MANEJA EL DASHBOARD
class ReservasController extends Controller
{
    // FUNCION PRINCIPAL DE LA CLASE DESDE LA CUAL SE HACEN TODAS LAS LLAMADAS
    public function index()
    {
        // OBTENEMOS LA INFO DE LOS CLIENTES
        // $infoClientes = $this->infoCliente();

        // $infoClientes_Personas = $infoClientes['infoClientes_Personas'];
        // $reservasPagadasPorCliente = $infoClientes['reservasPagadasPorCliente'];
        // $reservasTotalesPorCliente = $infoClientes['reservasTotalesPorCliente'];

        $reservasCliente = $this->reservasPorCliente();
        return view('reservas', compact(
            'reservasCliente'
        ));
    }

    public function export()
    {
        return Excel::download(new ReservasExport, 'reservas.xlsx');
    }

    // FUNCION QUE RETORNA INFORMACIÓN DEL CLIENTE
    public function infoCliente()
    {

        // PAGINACION DE PERSONAS CON ID_ROL = 0 (CLIENTES)
        $infoClientes_Personas = DB::table('personas')
            ->where('id_rol', 0)
            ->paginate(10);

        // OBTENEMOS EL PRECIO TOTAL DE LAS RESERVAS PAGADAS POR EL CLIENTE
        $infoClientes_ReservasPagadas = DB::table('reservas')
            ->select('id_cliente', DB::raw('SUM(precio_total) as total_reservas'))
            ->where('id_estado', 2) // ESTADO "PAGADO"
            ->groupBy('id_cliente')
            ->get();

        // OBTENEMOS EL NUMERO TOTAL DE RES3ERVAS DEL CLIENTE
        $infoClientes_ReservasTotales = DB::table('reservas')
            ->select('id_cliente', DB::raw('COUNT(*) as total_reservas'))
            ->groupBy('id_cliente')
            ->get();

        // ORGANIZAMOS LAS RESERVAS PAGADAS Y EL TOTAL POR CLIENTE
        $reservasPagadasPorCliente = [];
        foreach ($infoClientes_ReservasPagadas as $reserva) {
            $reservasPagadasPorCliente[$reserva->id_cliente] = $reserva->total_reservas;
        }

        $reservasTotalesPorCliente = [];
        foreach ($infoClientes_ReservasTotales as $reserva) {
            $reservasTotalesPorCliente[$reserva->id_cliente] = $reserva->total_reservas;
        }

        // Retornar los datos
        return [
            'infoClientes_Personas' => $infoClientes_Personas,
            'reservasPagadasPorCliente' => $reservasPagadasPorCliente,
            'reservasTotalesPorCliente' => $reservasTotalesPorCliente,
        ];
    }

    // FUNCION PARA MOSTRAR TODAS LAS RESERVAS DE UN CLIENTE
    public function reservasPorCliente()
    {

        $reservasCliente = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->join('personas', 'reservas.id_cliente', '=', 'personas.id')
            ->select(
                'reservas.*',
                'estados.nombre as estado_nombre',
                'servicios.nombre as servicio_nombre',
                'personas.nombre as persona_nombre',
                'personas.apellidos as persona_apellidos',
                'personas.email as persona_email',
                'personas.fecha_nacimiento as persona_nacimiento',
                'personas.id as persona_id'
            )
            ->orderBy('reservas.id')
            ->paginate(10);

        return $reservasCliente;
    }

    // FUNCION PARA OBTENER LA INFO DE UN CLIENTE QUE QUEREMOS ACTUALIZAR
    public function actualizarReserva($id_reserva)
    {
        $infoReserva = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->join('personas', 'reservas.id_cliente', '=', 'personas.id')
            ->where('reservas.id', $id_reserva)
            ->select(
                'reservas.*',
                'estados.nombre as estado_nombre',
                'servicios.nombre as servicio_nombre',
                'personas.nombre as persona_nombre',
                'personas.apellidos as persona_apellidos',
                'personas.email as persona_email',
                'personas.fecha_nacimiento as persona_nacimiento',
                'personas.id as persona_id'
            )
            ->get();

        return view('cliente/actualizar_reservas', compact(
            'infoReserva'
        ));
    }

    // FUNCION PARA OBTENER LA INFO DE UN CLIENTE QUE QUEREMOS ACTUALIZAR
    public function actualizarInfoReserva(Request $request, $id_reserva)
    {
        // Validar los datos enviados
        $request->validate([
            'numPersonas' => 'required|integer|min:1|max:10',
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required|date_format:H:i',
        ]);

        // Buscar el cliente por su ID
        $reserva = Reserva::findOrFail($id_reserva);

        // Verificar si los campos están vacíos y devolver un error si lo están
        if (
            $request->filled('numPersonas') === false || $request->filled('fecha_reserva') === false ||
            $request->filled('hora_reserva') === false 
        ) {
            return redirect()->route('reserva.actualizar', ['id_reserva' => $id_reserva])
                ->with('error', 'Todos los campos son obligatorios');
        }


        // Actualizar los datos solo si el campo ha cambiado
        if ($request->has('numPersonas') && $request->input('numPersonas') !== $reserva->num_personas) {
            $reserva->num_personas = $request->input('numPersonas');
        }

        if ($request->has('fecha_reserva') && $request->input('fecha_reserva') !== $reserva->fecha_reserva) {
            $reserva->fecha_reserva = $request->input('fecha_reserva');
        }

        if ($request->has('hora_reserva') && $request->input('hora_reserva') !== $reserva->hora_reserva) {
            $reserva->hora_reserva = $request->input('hora_reserva');
        }
        
        // Solo guardar si algún campo fue modificado
        if ($reserva->isDirty()) {
            $reserva->save(); // Guardar en la base de datos
        }

        // Redirigir a la página de actualización con mensaje de éxito
        return redirect()->route('reserva.actualizar', ['id_reserva' => $id_reserva])
            ->with('success', 'Cliente actualizado correctamente');
    }



    public function eliminarReserva($id_reserva)
    {
        // Eliminar reservas asociadas
        $eliminado = DB::table('reservas')->where('id', $id_reserva)->delete();

        if ($eliminado) {
            return redirect('/dashboard/reservas')->with('success', "Reserva con ID $id_reserva eliminado correctamente.");
        }

        return redirect('/dashboard/reservas')->with('error', "No se pudo eliminar la reserva con ID $id_reserva.");
    }

    // FUNCION PARA MOSTRAR LAS RESERVAS DE UN CLIENTE
    public function mostrar($id_cliente)
    {
        $reservasCliente = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->join('personas', 'reservas.id_cliente', '=', 'personas.id')
            ->where('id_cliente', $id_cliente)
            ->select(
                'reservas.*',
                'estados.nombre as estado_nombre',
                'servicios.nombre as servicio_nombre',
                'personas.nombre as persona_nombre',
                'personas.apellidos as persona_apellidos',
                'personas.email as persona_email',
                'personas.fecha_nacimiento as persona_nacimiento',
                'personas.id as persona_id'
            )
            ->orderBy('reservas.id')
            ->paginate(10);

        return view('/reserva/misReservas', compact(
            'reservasCliente'
        ));
    }

    /**
     * FUNCION PARA RESERVAR KARTS
     */
    public function reservaKarts($id)
    {
        $infoReserva = DB::table('servicio_karting')
            ->where('id', $id)
            ->get();

        return view('/reserva/karts/reservar-karts', compact(
            'id',
            'infoReserva'
        ));
    }

    // ESTA FUNCION CREA LA RESERVA
    public function crearReservaKarts(Request $request)
    {
        // VALIDO LOS CAMPOS
        $request->validate([
            'numPersonas' => 'required|integer|min:1|max:10',
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required|date_format:H:i',
        ]);

        // COMPRUEBO QUE EL CLIENTE NO TENGA OTRA RESERVA EL MISMO DIA A LA MISMA HORA
        $comprobar = DB::table('reservas')
            ->where('id_cliente', $request->input('id_cliente'))
            ->where('hora_reserva', $request->input('hora_reserva'))
            ->where('fecha_reserva', $request->input('fecha_reserva'))
            ->exists();

        // SI LA TIENE LO ECHAMOS ATRAS SINO SE RESERVA
        if ($comprobar) {
            return back()->with('error', 'Ya existe una reserva para este cliente en el mismo horario y fecha.');
        } else {
            // Realiza el insert en la base de datos
            DB::table('reservas')->insert([
                'id_cliente' => $request->input('id_cliente'),
                'id_servicio' => 1, // KARTS SIEMPRE 1
                'id_servicio_oferta' => $request->input('id_oferta'),
                'num_personas' => $request->input('numPersonas'),
                'precio_total' => $request->input('precio') * $request->input('numPersonas'),
                'hora_reserva' => $request->input('hora_reserva'),
                'fecha_reserva' => $request->input('fecha_reserva'),
                'id_estado' => 1, // SIEMPRE 1 (RESERVADO)
            ]);

            // Redirige con un mensaje de éxito
            return redirect()->route('reservar.karts', ['id' => $request->input('id_oferta')])->with('success', 'Reserva realizada con éxito');
        }
    }

    /**
     * FUNCION PARA RESERVAR PAINTBALL
     */
    public function reservaPaintball($id)
    {
        $infoReserva = DB::table('servicio_paintball')
            ->where('id', $id)
            ->get();

        return view('/reserva/paintball/reservar-paintball', compact(
            'id',
            'infoReserva'
        ));
    }

    // ESTA FUNCION CREA LA RESERVA
    public function crearReservaPaintball(Request $request)
    {
        // VALIDO LOS CAMPOS
        $request->validate([
            'numPersonas' => 'required|integer|min:1|max:10',
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required|date_format:H:i',
        ]);

        // COMPRUEBO QUE EL CLIENTE NO TENGA OTRA RESERVA EL MISMO DIA A LA MISMA HORA
        $comprobar = DB::table('reservas')
            ->where('id_cliente', $request->input('id_cliente'))
            ->where('hora_reserva', $request->input('hora_reserva'))
            ->where('fecha_reserva', $request->input('fecha_reserva'))
            ->exists();

        // SI LA TIENE LO ECHAMOS ATRAS SINO SE RESERVA
        if ($comprobar) {
            return back()->with('error', 'Ya existe una reserva para este cliente en el mismo horario y fecha.');
        } else {
            // Realiza el insert en la base de datos
            DB::table('reservas')->insert([
                'id_cliente' => $request->input('id_cliente'),
                'id_servicio' => 3, // PAINTBALL SIEMPRE 3
                'id_servicio_oferta' => $request->input('id_oferta'),
                'num_personas' => $request->input('numPersonas'),
                'precio_total' => $request->input('precio') * $request->input('numPersonas'),
                'hora_reserva' => $request->input('hora_reserva'),
                'fecha_reserva' => $request->input('fecha_reserva'),
                'id_estado' => 1, // SIEMPRE 1 (RESERVADO)
            ]);

            // Redirige con un mensaje de éxito
            return redirect()->route('reservar.paintball', ['id' => $request->input('id_oferta')])->with('success', 'Reserva realizada con éxito');
        }
    }

    /**
     * FUNCION PARA RESERVAR RESTAURANTE
     */
    public function reservaRestaurante($id)
    {
        $infoReserva = DB::table('servicio_restaurante')
            ->where('id', $id)
            ->get();

        return view('/reserva/restaurante/reservar-restaurante', compact(
            'id',
            'infoReserva'
        ));
    }

    // ESTA FUNCION CREA LA RESERVA
    public function crearReservaRestaurante(Request $request)
    {
        // VALIDO LOS CAMPOS
        $request->validate([
            'numPersonas' => 'required|integer|min:1|max:10',
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required|date_format:H:i',
        ]);

        // COMPRUEBO QUE EL CLIENTE NO TENGA OTRA RESERVA EL MISMO DIA A LA MISMA HORA
        $comprobar = DB::table('reservas')
            ->where('id_cliente', $request->input('id_cliente'))
            ->where('hora_reserva', $request->input('hora_reserva'))
            ->where('fecha_reserva', $request->input('fecha_reserva'))
            ->exists();

        // SI LA TIENE LO ECHAMOS ATRAS SINO SE RESERVA
        if ($comprobar) {
            return back()->with('error', 'Ya existe una reserva para este cliente en el mismo horario y fecha.');
        } else {
            // Realiza el insert en la base de datos
            DB::table('reservas')->insert([
                'id_cliente' => $request->input('id_cliente'),
                'id_servicio' => 4, // RESTAURANTE SIEMPRE 4
                'id_servicio_oferta' => $request->input('id_oferta'),
                'num_personas' => $request->input('numPersonas'),
                'precio_total' => $request->input('precio') * $request->input('numPersonas'),
                'hora_reserva' => $request->input('hora_reserva'),
                'fecha_reserva' => $request->input('fecha_reserva'),
                'id_estado' => 1, // SIEMPRE 1 (RESERVADO)
            ]);

            // Redirige con un mensaje de éxito
            return redirect()->route('reservar.restaurante', ['id' => $request->input('id_oferta')])->with('success', 'Reserva realizada con éxito');
        }
    }

    /**
     * FUNCION PARA RESERVAR JUMPING
     */
    public function reservaJumping($id)
    {
        $infoReserva = DB::table('servicio_jumping')
            ->where('id', $id)
            ->get();

        return view('/reserva/jumping/reservar-jumping', compact(
            'id',
            'infoReserva'
        ));
    }

    // ESTA FUNCION CREA LA RESERVA
    public function crearReservaJumping(Request $request)
    {
        // VALIDO LOS CAMPOS
        $request->validate([
            'numPersonas' => 'required|integer|min:1|max:10',
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required|date_format:H:i',
        ]);

        // COMPRUEBO QUE EL CLIENTE NO TENGA OTRA RESERVA EL MISMO DIA A LA MISMA HORA
        $comprobar = DB::table('reservas')
            ->where('id_cliente', $request->input('id_cliente'))
            ->where('hora_reserva', $request->input('hora_reserva'))
            ->where('fecha_reserva', $request->input('fecha_reserva'))
            ->exists();

        // SI LA TIENE LO ECHAMOS ATRAS SINO SE RESERVA
        if ($comprobar) {
            return back()->with('error', 'Ya existe una reserva para este cliente en el mismo horario y fecha.');
        } else {
            // Realiza el insert en la base de datos
            DB::table('reservas')->insert([
                'id_cliente' => $request->input('id_cliente'),
                'id_servicio' => 2, // JUMPING SIEMPRE 2
                'id_servicio_oferta' => $request->input('id_oferta'),
                'num_personas' => $request->input('numPersonas'),
                'precio_total' => $request->input('precio') * $request->input('numPersonas'),
                'hora_reserva' => $request->input('hora_reserva'),
                'fecha_reserva' => $request->input('fecha_reserva'),
                'id_estado' => 1, // SIEMPRE 1 (RESERVADO)
            ]);

            // Redirige con un mensaje de éxito
            return redirect()->route('reservar.jumping', ['id' => $request->input('id_oferta')])->with('success', 'Reserva realizada con éxito');
        }
    }

    /**
     * FUNCION PARA RESERVAR OCIO
     */
    public function reservaOcio($id)
    {
        $infoReserva = DB::table('servicio_recreativos')
            ->where('id', $id)
            ->get();

        return view('/reserva/ocio/reservar-ocio', compact(
            'id',
            'infoReserva'
        ));
    }

    // ESTA FUNCION CREA LA RESERVA
    public function crearReservaOcio(Request $request)
    {
        // VALIDO LOS CAMPOS
        $request->validate([
            'numPersonas' => 'required|integer|min:1|max:10',
            'fecha_reserva' => 'required|date',
            'hora_reserva' => 'required|date_format:H:i',
        ]);

        // COMPRUEBO QUE EL CLIENTE NO TENGA OTRA RESERVA EL MISMO DIA A LA MISMA HORA
        $comprobar = DB::table('reservas')
            ->where('id_cliente', $request->input('id_cliente'))
            ->where('hora_reserva', $request->input('hora_reserva'))
            ->where('fecha_reserva', $request->input('fecha_reserva'))
            ->exists();

        // SI LA TIENE LO ECHAMOS ATRAS SINO SE RESERVA
        if ($comprobar) {
            return back()->with('error', 'Ya existe una reserva para este cliente en el mismo horario y fecha.');
        } else {
            // Realiza el insert en la base de datos
            DB::table('reservas')->insert([
                'id_cliente' => $request->input('id_cliente'),
                'id_servicio' => 5, // OCIO SIEMPRE 5
                'id_servicio_oferta' => $request->input('id_oferta'),
                'num_personas' => $request->input('numPersonas'),
                'precio_total' => $request->input('precio') * $request->input('numPersonas'),
                'hora_reserva' => $request->input('hora_reserva'),
                'fecha_reserva' => $request->input('fecha_reserva'),
                'id_estado' => 1, // SIEMPRE 1 (RESERVADO)
            ]);

            // Redirige con un mensaje de éxito
            return redirect()->route('reservar.ocio', ['id' => $request->input('id_oferta')])->with('success', 'Reserva realizada con éxito');
        }
    }
}
