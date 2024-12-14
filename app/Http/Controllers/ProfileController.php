<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function edit()
    {
        // Usamos Auth::user() para obtener la instancia de Persona
        return view('profile.edit', [
            'user' => Auth::user(),  // Auth::user() devuelve una instancia de Persona
        ]);
    }

    public function update(Request $request)
    {
        // Auth::user() NOS DEVUELVE UNA INSTANCIA DE PERSONA QUE ALMACENAMOS EN UNA VARIABLE
        $user = Auth::user();
        
        // VALIDAMOS LOS DATOS QUE ENVIAMOS PARA ACTUALIZAR EL PERFIL
        $request->validate([
            'nombre' => 'required|string|max:255', // EL NOMBRE DE LOS CAMPOS SERA EL MISMO QUE EL DEFINIDO EN PERSONA
            'apellidos' => 'required|string|max:50',
            'email' => 'required|email|max:255|unique:personas,email,' . $user->id,
            'usuario' => 'required|string|max:50',
            'fecha_nacimiento' => 'required|date',
        ]);

        // ACTUALIZAMOS LA INFORMACION CON LOS NUEVOS VALORES
        $user->update([
            'nombre' => $request->nombre,
            'apellidos' => $request->apellidos,
            'email' => $request->email,
            'usuario' => $request->usuario,
            'fecha_nacimiento' => $request->fecha_nacimiento,

        ]);

        // REDIRECCIONAMOS AL PERFIL CON LOS DATOS ACTUALIZADOS
        return redirect()->route('profile.edit')->with('status', 'profile-updated');
    }

    public function updatePassword(Request $request)
    {
        // Auth::user() NOS DEVUELVE UNA INSTANCIA DE PERSONA QUE ALMACENAMOS EN UNA VARIABLE
        $user = Auth::user();

        // VALIDANDO CONTRASEÑA
        $request->validate([
            'current_password' => 'required|string', // CAMPO DE CONTRASEÑA ACTUAL (OBLIGATORIA)
            'password' => 'required|string|min:8|confirmed', // NUEVA CONTRASEÑA MINIMA DE 8 CARACTERES
        ]);

        // VERIFICAMOS QUE LA CONTRASEÑA ACTUAL SEA CORRECTA
        if (!Hash::check($request->current_password, $user->contraseña)) {
            return back()->withErrors(['current_password' => 'La contraseña actual no es correcta.']);
        }

        // SI LA CONTRASEÑA ACTUAL ES CORRECTA ACTUALIZAMOS LA CONTRASEÑA
        $user->update([
            'contraseña' => bcrypt($request->password),  // ENCRIPTAMOS ANTES DE ACTUALIZAR
        ]);

        // REDIRIGIMOS CON MENSAJE DE EXITO
        return redirect()->route('profile.edit')->with('status', 'password-updated');
    }


    /**
     * Delete the user's account.
     */
    public function destroy(Request $request)
    {
        // Validación para eliminar la cuenta
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'], // Asegúrate de que la contraseña actual sea válida
        ]);

        $user = $request->user();

        // Logout y eliminación
        Auth::logout();
        $user->delete(); // Eliminar el usuario de la base de datos

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }


    public function show(Request $request)
    {
        // Devuelve los datos del perfil en formato JSON
        return response()->json([
            'user' => $request->user(),
        ]);
    }
}
