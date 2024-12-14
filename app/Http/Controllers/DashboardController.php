<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

// CLASE QUE MANEJA EL DASHBOARD
class DashboardController extends Controller
{
    // FUNCION PRINCIPAL DE LA CLASE DESDE LA CUAL SE HACEN TODAS LAS LLAMADAS
    public function index()
    {
        // VARIABLES QUE DEVUELVEN LAS 4 ESTADISTICAS PRINCIPALES
        $conteoReservas = $this->reservasTotales();
        $totalGenerado = $this->totalGenerado();
        $clientesTotales = $this->clientesTotales();
        $totalPendiente = $this->totalPendiente();

        // VARIABLES QUE DEVUELVEN ESTADISTICAS DE GRAFICA
        $reservasMes = $this->numeroReservasMes();

        $reservasKarts = $reservasMes['reservasKarts'];
        $reservasJumping = $reservasMes['reservasJumping'];
        $reservasPaintball = $reservasMes['reservasPaintball'];
        $reservasRestaurante = $reservasMes['reservasRestaurante'];
        $reservasRecreativos = $reservasMes['reservasRecreativos'];

        // RETORNAMOS LA VISTA CON TODAS LAS VARIABLES QUE LE PASAMOS
        return view('dashboard', compact(
            'conteoReservas',
            'totalGenerado',
            'clientesTotales',
            'totalPendiente',
            'reservasKarts',
            'reservasJumping',
            'reservasPaintball',
            'reservasRestaurante',
            'reservasRecreativos'
        ));
    }

    // FUNCION PARA OBTENER EL NUMERO DE RESERVAS TOTALES
    public function totalGenerado()
    {
        // Realiza la consulta a la base de datos para obtener todas las reservas
        $totalGenerado = DB::table('reservas')
            ->where('id_estado', 2)
            ->sum('precio_total');

        $totalFormateado = number_format($totalGenerado, 2, ',', '.');

        // Devuelve los resultados de la consulta
        return $totalFormateado;
    }

    // FUNCION PARA OBTENER EL NUMERO DE RESERVAS TOTALES
    public function clientesTotales()
    {
        // Realiza la consulta a la base de datos para obtener todas las reservas
        $clientesTotales = DB::table('personas')
            ->where('id_rol', 0)
            ->count();

        // Devuelve los resultados de la consulta
        return $clientesTotales;
    }

    // FUNCION PARA OBTENER EL NUMERO DE RESERVAS TOTALES
    public function reservasTotales()
    {
        // Realiza la consulta a la base de datos para obtener todas las reservas
        $conteoReservas = DB::table('reservas')->count();

        // Devuelve los resultados de la consulta
        return $conteoReservas;
    }

    // FUNCION PARA OBTENER EL NUMERO DE RESERVAS TOTALES
    public function totalPendiente()
    {
        // Realiza la consulta a la base de datos para obtener todas las reservas
        $totalPendiente = DB::table('reservas')
            ->where('id_estado', 4)
            ->sum('precio_total');

        $totalFormateado = number_format($totalPendiente, 2, ',', '.');

        // Devuelve los resultados de la consulta
        return $totalFormateado;
    }

    // FUNCION QUE DEVUELVE EL NUMERO DE RESERVAS DE CADA SERVICIO POR
    public function numeroReservasMes()
    {
        for ($i = 1; $i <= 12; $i++) {
            $reservasKarts[] = DB::table('reservas')
                ->where('id_servicio', 1)
                ->whereMonth('fecha_reserva', $i)
                ->count();

            $reservasJumping[] = DB::table('reservas')
                ->where('id_servicio', 2)
                ->whereMonth('fecha_reserva', $i)
                ->count();

            $reservasPaintball[] = DB::table('reservas')
                ->where('id_servicio', 3)
                ->whereMonth('fecha_reserva', $i)
                ->count();

            $reservasRestaurante[] = DB::table('reservas')
                ->where('id_servicio', 4)
                ->whereMonth('fecha_reserva', $i)
                ->count();

            $reservasRecreativos[] = DB::table('reservas')
                ->where('id_servicio', 5)
                ->whereMonth('fecha_reserva', $i)
                ->count();
        }

        // DEVOLVEMOS TODAS LAS RESERVAS
        return [
            'reservasKarts' => $reservasKarts,
            'reservasJumping' => $reservasJumping,
            'reservasPaintball' => $reservasPaintball,
            'reservasRestaurante' => $reservasRestaurante,
            'reservasRecreativos' => $reservasRecreativos
        ];
    }
}
