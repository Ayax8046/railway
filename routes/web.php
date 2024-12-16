<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\ReservasController;
use App\Http\Controllers\TrabajadoresController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FPDFController;

use App\Http\Controllers\Auth\EmailVerificationPromptController;


// Rutas de autenticación (login, registro y logout)
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {

    // Ruta para dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Ruta de Clientes
    Route::get('/dashboard/clientes', [ClientesController::class, 'index'])->name('clientes');
    Route::get('/dashboard/reservas', [ReservasController::class, 'index'])->name('reservas');
    Route::get('/dashboard/trabajadores', [TrabajadoresController::class, 'index'])->name('trabajadores');

    Route::get('/dashboard/clientes/{id_cliente}', [ClientesController::class, 'reservasPorCliente']);
    Route::get('/dashboard/clientes/actualizar/{id_cliente}', [ClientesController::class, 'actualizarCliente'])->name('cliente.actualizar');
    Route::put('/dashboard/clientes/actualizarInfo/{id_cliente}', [ClientesController::class, 'actualizarInfoCliente'])->name('cliente.update');
    Route::get('/dashboard/reservas/actualizar/{id_reserva}', [ReservasController::class, 'actualizarReserva'])->name('reserva.actualizar');
    Route::put('/dashboard/reservas/actualizarInfo/{id_reserva}', [ReservasController::class, 'actualizarInfoReserva'])->name('reserva.update');
    Route::get('/dashboard/clientes/eliminar/{id_cliente}', [ClientesController::class, 'eliminarCliente']);

    Route::get('/dashboard/reservas/eliminar/{id_reserva}', [ReservasController::class, 'eliminarReserva']);

    // Cerrar sesión
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    // Ruta para ver el perfil de usuario
    //Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show'); // Esta es la nueva ruta

    // Ruta para borrar el perfil de usuario
    Route::delete('/profile/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ruta para editar el perfil de usuario
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Ruta para actualizar el perfil de usuario
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    // Ruta para actualizar la contraseña
    Route::put('/user/password', [ProfileController::class, 'updatePassword'])->name('user.password.update');

    // RUTAS PARA OBTENER LOS PDFs
    Route::get('clientesPDF/{id_cliente}', [FPDFController::class, 'clientesPDF'])->name('clientesPDF');
    Route::get('reservaPDF/{id_reserva}', [FPDFController::class, 'reservaPDF'])->name('reservaPDF');
    Route::get('reservasPDF', [FPDFController::class, 'reservasPDF'])->name('reservasPDF');

    // Ruta para la verificación de correo electrónico
    Route::get('/email/verify', [EmailVerificationPromptController::class, 'show'])->name('verification.notice');
    Route::get('/email/verify/{id}/{hash}', [EmailVerificationPromptController::class, 'verify'])
        ->middleware('signed')->name('verification.verify');
    Route::post('/email/resend', [EmailVerificationPromptController::class, 'resend'])->name('verification.resend');

    Route::get('/reservas/{id}', [ReservasController::class, 'mostrar'])->name('misReservas');

    // SERVICIO KARTS
    Route::get('/reservar-karts/{id}', [ReservasController::class, 'reservaKarts'])->name('reservar.karts');
    Route::post('/reservar-karts/crear/', [ReservasController::class, 'crearReservaKarts'])->name('karts.create');

    // SERVICIO JUMPING
    Route::get('/reservar-jumping/{id}', [ReservasController::class, 'reservaJumping'])->name('reservar.jumping');
    Route::post('/reservar-jumping/crear', [ReservasController::class, 'crearReservaJumping'])->name('jumping.create');

    // SERVICIO OCIO
    Route::get('/reservar-ocio/{id}', [ReservasController::class, 'reservaOcio'])->name('reservar.ocio');
    Route::post('/reservar-ocio/crear', [ReservasController::class, 'crearReservaOcio'])->name('ocio.create');

    // SERVICIO RESTAURANTE
    Route::get('/reservar-restaurante/{id}', [ReservasController::class, 'reservaRestaurante'])->name('reservar.restaurante');
    Route::post('/reservar-restaurante/crear', [ReservasController::class, 'crearReservaRestaurante'])->name('restaurante.create');

    // SERVICIO PAINTBALL
    Route::get('/reservar-paintball/{id}', [ReservasController::class, 'reservaPaintball'])->name('reservar.paintball');
    Route::post('/reservar-paintball/crear', [ReservasController::class, 'crearReservaPaintball'])->name('paintball.create');

    // EXCEL
    Route::get('/exportar-reservas', [ReservasController::class, 'export'])->name('excelReservas');

});

Route::middleware('auth')->get('/user', function () {
    return response()->json(Auth::user());
});

// Rutas SPA para Vue.js
Route::get('{any}', function () {
    return file_get_contents(public_path('index.html'));
})->where('any', '.*');
