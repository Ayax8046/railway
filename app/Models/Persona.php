<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Persona extends Authenticatable
{
    use Notifiable;

    protected $table = 'personas';

    protected $fillable = [
        'nombre',
        'apellidos',
        'email',
        'usuario',
        'contraseña',
        'fecha_nacimiento',
        'id_rol',
        'id_promo',
    ];

    protected $hidden = [
        'contraseña',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Personaliza el atributo de contraseña
    public function setPasswordAttribute($value)
    {
        $this->attributes['contraseña'] = bcrypt($value);
    }

    public function getAuthPassword()
    {
        return $this->contraseña;
    }

    // Enviar notificación de restablecimiento de contraseña
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new \Illuminate\Auth\Notifications\ResetPassword($token));
    }
}
