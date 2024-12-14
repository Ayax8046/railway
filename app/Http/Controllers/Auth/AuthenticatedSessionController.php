<?php

namespace App\Http\Controllers\Auth;

// IMPORTACIONES
use App\Http\Controllers\Controller;
use App\Models\Persona;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

// CLASE ENCARGADA DEL LOGIN
class AuthenticatedSessionController extends Controller
{
    // FUNCION ENCARGADA DE RETORNAR LA VISTA DEL LOGIN
    public function create(): View
    {
        return view('auth.login');
    }

    // FUNCION QUE CREA LAS SESIONES DE LOGUEO Y COMPRUEBA QUE EL USUARIO EXISTA
    public function store(LoginRequest $request): RedirectResponse
    {
        // BUSCAMOS EL EMAIL EN NUESTRA BASE DE DATOS
        $persona = Persona::where('email', $request->email)->first();

        // COMPROBAMOS SI EL EMAIL EXISTE Y SI LA CONTRASEÑA INTRODUCIDA COINCIDE CON LA ALMACENADA
        if ($persona && Hash::check($request->password, $persona->contraseña)) {

            // INFORMACION CORRECTA = INICIAMOS SESION
            Auth::login($persona);

            // REGENERAMOS LA SESION PARA EVITAR ATAQUES DE FIJACION DE SESION
            $request->session()->regenerate();

            // COMPROBAMOS EL ROL DEL USUARIO
            if ($persona->id_rol === 0) {
                // GUARDAMOS EN LA SESIÓN EL TIPO DE USUARIO COMO CLIENTE
                session(['user_role' => 'cliente']);

                return redirect('/'); // REDIRIGIMOS A INICIO
            } elseif (in_array($persona->id_rol, [1, 2])) {
                // GUARDAMOS EN LA SESIÓN EL TIPO DE USUARIO SEGÚN SU ROL
                $role = $persona->id_rol === 1 ? 'trabajador' : 'admin';
                session(['user_role' => $role]);

                return redirect()->intended(route('dashboard')); // REDIRIGIMOS AL DASHBOARD
            }

            // SI SE ENCUENTRA UN ROL INESPERADO CERRAMOS LA SESION POR SEGURIDAD
            Auth::logout();
            return back()->withErrors([
                'email' => 'Rol de usuario no permitido.',
            ]);
        }

        // SI LA AUTENTICACIÓN FALLA DEVOLVEMOS LA VISTA CON UN ERROR
        return back()->withErrors([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }

    // FUNCION PARA OBTENER EL USUARIO QUE INICIO SESION
    public function getUser()
    {
        if (Auth::check()) {
            return response()->json([
                'authenticated' => true,
                'user' => Auth::user(),
            ]);
        }

        return response()->json([
            'authenticated' => false,
            'user' => null,
        ]);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
