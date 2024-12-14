<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// CLASE QUE MANEJA EL DASHBOARD
class TrabajadoresController extends Controller
{
    // FUNCION PRINCIPAL DE LA CLASE DESDE LA CUAL SE HACEN TODAS LAS LLAMADAS
    public function index()
    {
        // OBTENEMOS LA INFO DE LOS CLIENTES
        // $infoClientes = $this->infoCliente();

        // $infoClientes_Personas = $infoClientes['infoClientes_Personas'];
        // $reservasPagadasPorCliente = $infoClientes['reservasPagadasPorCliente'];
        // $reservasTotalesPorCliente = $infoClientes['reservasTotalesPorCliente'];

        return view('trabajadores');
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
    public function reservasPorCliente($id_cliente)
    {
        $nombreCliente = DB::table('personas')
            ->select('nombre', 'apellidos')
            ->where('id', $id_cliente)
            ->get();

        $reservasCliente = DB::table('reservas')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->where('id_cliente', $id_cliente)
            ->select('reservas.*', 'estados.nombre as estado_nombre', 'servicios.nombre as servicio_nombre')
            ->paginate(10);

        return view('cliente/reservas_cliente', compact(
            'nombreCliente',
            'reservasCliente'
        ));
    }

    // FUNCION PARA OBTENER LA INFO DE UN CLIENTE QUE QUEREMOS ACTUALIZAR
    public function actualizarCliente($id_cliente)
    {
        $infoCliente = DB::table('personas')
            ->where('id', $id_cliente)
            ->get();

        return view('cliente/actualizar_cliente', compact(
            'infoCliente'
        ));
    }

    // FUNCION PARA OBTENER LA INFO DE UN CLIENTE QUE QUEREMOS ACTUALIZAR
    public function actualizarInfoCliente(Request $request, $id_cliente)
    {
        // Validar los datos enviados
        $request->validate([
            'nombre' => 'required|string|max:25',
            'apellidos' => 'required|string|max:50',
            'email' => 'required|email|max:50|unique:personas,email,' . $id_cliente,
            'fecha_nacimiento' => 'required|date|before:today',
        ]);

        // Buscar el cliente por su ID
        $cliente = Persona::findOrFail($id_cliente);

        // Verificar si los campos están vacíos y devolver un error si lo están
        if (
            $request->filled('nombre') === false || $request->filled('apellidos') === false ||
            $request->filled('email') === false || $request->filled('fecha_nacimiento') === false
        ) {
            return redirect()->route('cliente.actualizar', ['id_cliente' => $id_cliente])
                ->with('error', 'Todos los campos son obligatorios');
        }


        // Actualizar los datos solo si el campo ha cambiado
        if ($request->has('nombre') && $request->input('nombre') !== $cliente->nombre) {
            $cliente->nombre = $request->input('nombre');
        }

        if ($request->has('apellidos') && $request->input('apellidos') !== $cliente->apellidos) {
            $cliente->apellidos = $request->input('apellidos');
        }

        if ($request->has('email') && $request->input('email') !== $cliente->email) {
            $cliente->email = $request->input('email');
        }

        if ($request->has('fecha_nacimiento') && $request->input('fecha_nacimiento') !== $cliente->fecha_nacimiento) {
            $cliente->fecha_nacimiento = $request->input('fecha_nacimiento');
        }

        // Solo guardar si algún campo fue modificado
        if ($cliente->isDirty()) {
            $cliente->save(); // Guardar en la base de datos
        }

        // Redirigir a la página de actualización con mensaje de éxito
        return redirect()->route('cliente.actualizar', ['id_cliente' => $id_cliente])
            ->with('success', 'Cliente actualizado correctamente');
    }



    public function eliminarCliente($id_cliente)
    {
        // Eliminar cliente
        $eliminado = DB::table('personas')->where('id', $id_cliente)->delete();

        // Eliminar reservas asociadas
        DB::table('reservas')->where('id_cliente', $id_cliente)->delete();

        if ($eliminado) {
            return redirect('/dashboard/clientes')->with('success', "Cliente con ID $id_cliente eliminado correctamente.");
        }

        return redirect('/dashboard/clientes')->with('error', "No se pudo eliminar el cliente con ID $id_cliente.");
    }
}
