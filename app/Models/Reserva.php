<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    // Campos rellenables para asignación masiva
    protected $fillable = [
        'id_cliente',
        'id_servicio',
        'id_servicio_oferta',
        'num_personas',
        'precio_total',
        'hora_reserva',
        'fecha_reserva',
        'id_estado',
    ];
}
