<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function paintball()
    {
        return view('servicios.paintball');  // Asegúrate de tener esta vista creada
    }

    public function restaurante()
    {
        return view('servicios.restaurante');  // Asegúrate de tener esta vista creada
    }

    public function ocio()
    {
        return view('servicios.ocio');  // Asegúrate de tener esta vista creada
    }

    public function karts()
    {
        return view('servicios.karts');  // Asegúrate de tener esta vista creada
    }

    public function jumping()
    {
        return view('servicios.jumping');  // Asegúrate de tener esta vista creada
    }
}
