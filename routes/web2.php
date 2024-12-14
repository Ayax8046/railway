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

// Rutas de autenticación
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});

Route::middleware('auth')->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Clientes
    Route::prefix('dashboard/clientes')->group(function () {
        Route::get('/', [ClientesController::class, 'index'])->name('clientes');
        Route::get('/{id_cliente}', [ClientesController::class, 'reservasPorCliente']);
        Route::get('/actualizar/{id_cliente}', [ClientesController::class, 'actualizarCliente'])->name('clientes.actualizar');
        Route::put('/actualizarInfo/{id_cliente}', [ClientesController::class, 'actualizarInfoCliente'])->name('clientes.update');
        Route::delete('/{id_cliente}', [ClientesController::class, 'eliminarCliente'])->name('clientes.destroy');
    });

    // Reservas
    Route::prefix('dashboard/reservas')->group(function () {
        Route::get('/', [ReservasController::class, 'index'])->name('reservas');
        Route::get('/actualizar/{id_reserva}', [ReservasController::class, 'actualizarReserva'])->name('reservas.actualizar');
        Route::put('/actualizarInfo/{id_reserva}', [ReservasController::class, 'actualizarInfoReserva'])->name('reservas.update');
        Route::delete('/{id_reserva}', [ReservasController::class, 'eliminarReserva'])->name('reservas.destroy');
        Route::get('/exportar', [ReservasController::class, 'export'])->name('reservas.export');
    });

    // Servicios
    Route::prefix('reservar')->group(function () {
        Route::get('/karts/{id}', [ReservasController::class, 'reservaKarts'])->name('reservar.karts');
        Route::post('/karts/crear', [ReservasController::class, 'crearReservaKarts'])->name('karts.create');

        Route::get('/jumping/{id}', [ReservasController::class, 'reservaJumping'])->name('reservar.jumping');
        Route::post('/jumping/crear', [ReservasController::class, 'crearReservaJumping'])->name('jumping.create');

        Route::get('/ocio/{id}', [ReservasController::class, 'reservaOcio'])->name('reservar.ocio');
        Route::post('/ocio/crear', [ReservasController::class, 'crearReservaOcio'])->name('ocio.create');

        Route::get('/restaurante/{id}', [ReservasController::class, 'reservaRestaurante'])->name('reservar.restaurante');
        Route::post('/restaurante/crear', [ReservasController::class, 'crearReservaRestaurante'])->name('restaurante.create');

        Route::get('/paintball/{id}', [ReservasController::class, 'reservaPaintball'])->name('reservar.paintball');
        Route::post('/paintball/crear', [ReservasController::class, 'crearReservaPaintball'])->name('paintball.create');
    });

    // Trabajadores
    Route::get('/dashboard/trabajadores', [TrabajadoresController::class, 'index'])->name('trabajadores');

    // Perfil de usuario
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'show'])->name('profile.show');
        Route::get('/edit', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::put('/password', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
        Route::delete('/destroy', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    // PDF
    Route::prefix('pdf')->group(function () {
        Route::get('/clientes/{id_cliente}', [FPDFController::class, 'clientesPDF'])->name('pdf.clientes');
        Route::get('/reserva/{id_reserva}', [FPDFController::class, 'reservaPDF'])->name('pdf.reserva');
        Route::get('/reservas', [FPDFController::class, 'reservasPDF'])->name('pdf.reservas');
    });

    // Verificación de correo electrónico
    Route::prefix('email')->group(function () {
        Route::get('/verify', [EmailVerificationPromptController::class, 'show'])->name('verification.notice');
        Route::get('/verify/{id}/{hash}', [EmailVerificationPromptController::class, 'verify'])
            ->middleware('signed')->name('verification.verify');
        Route::post('/resend', [EmailVerificationPromptController::class, 'resend'])->name('verification.resend');
    });

    // Mis reservas
    Route::get('/reservas/{id}', [ReservasController::class, 'mostrar'])->name('misReservas');

    // Logout
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');
});

// Ruta para obtener el usuario autenticado
Route::middleware('auth')->get('/user', function () {
    return response()->json(Auth::user());
});

// SPA Vue.js
Route::get('{any}', function () {
    return file_get_contents(public_path('index.html'));
})->where('any', '.*');
