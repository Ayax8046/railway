<?php

namespace App\Exports;

use App\Models\Reserva;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class ReservasExport implements FromCollection, WithHeadings, WithMapping
{
    /**
     * OBTENER LA INFORMACION DE LAS RESERVAS
     *
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Reserva::join('personas', 'reservas.id_cliente', '=', 'personas.id')
            ->join('servicios', 'reservas.id_servicio', '=', 'servicios.id')
            ->join('estados', 'reservas.id_estado', '=', 'estados.id')
            ->select(
                'reservas.id',
                'personas.nombre as cliente_nombre',
                'personas.apellidos as cliente_apellidos',
                'servicios.nombre as servicio_nombre',
                'reservas.id_servicio_oferta',
                'reservas.num_personas',
                'reservas.precio_total',
                'reservas.hora_reserva',
                'reservas.fecha_reserva',
                'estados.nombre as estado_nombre'
            )
            ->get();
    }

    /**
     * DEFIIR LOS ECABEZADOS DE CADA COLUMNA
     *
     * @return array
     */
    public function headings(): array
    {
        return [
            'ID',
            'Cliente',
            'Servicio',
            'Oferta',
            'Número de personas',
            'Precio total',
            'Hora de reserva',
            'Fecha de reserva',
            'Estado',
        ];
    }

    /**
     * MAPEAR LOS DATOS
     *
     * @param \App\Models\Reserva $reserva
     * @return array
     */
    public function map($reserva): array
    {
        return [
            $reserva->id,
            $reserva->cliente_nombre . ' ' . $reserva->cliente_apellidos,
            $reserva->servicio_nombre,
            $reserva->id_servicio_oferta,
            $reserva->num_personas,
            $this->formatCurrency($reserva->precio_total),
            $reserva->hora_reserva,
            $reserva->fecha_reserva,
            $reserva->estado_nombre,
        ];
    }

    /**
     * FUNCIÓN PARA FORMATEAR EL PRECIO COMO MONEDA (2.345,00€)
     *
     * @param float $precio
     * @return string
     */
    private function formatCurrency($precio)
    {
        return number_format($precio, 2, ',', '.') . '€';
    }
}
