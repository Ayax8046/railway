<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Persona;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        // Validar los datos de registro
        $request->validate([
            'nombre' => ['required', 'string', 'max:25'],
            'apellidos' => ['required', 'string', 'max:50'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:personas,email'], // Tabla y campo correctos
            'usuario' => ['required', 'string', 'max:25', 'unique:personas,usuario'],
            'contraseña' => ['required', 'confirmed', Rules\Password::defaults()],
            'fecha_nacimiento' => ['required', 'date'],
        ]);

        // Crear una nueva persona con valores por defecto para id_rol e id_promo
        $persona = Persona::create([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'usuario' => $request->usuario,
            'contraseña' => Hash::make($request->contraseña), // Hashear la contraseña
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'id_rol' => 0, // Valor predeterminado
            'id_promo' => 1, // Valor predeterminado
        ]);

        // Disparar el evento de registro
        event(new Registered($persona));

        // Autenticar al usuario
        Auth::login($persona);

        return redirect(route('dashboard', absolute: false));
    }
}
