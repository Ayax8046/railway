<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path=/database/migrations/2024_10_29_164640_reservas.php
     */
    public function up(): void
    {
        Schema::create('reservas', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->integer('id_cliente'); 
            $table->integer('id_servicio'); 
            $table->integer('id_servicio_oferta');
            $table->integer('num_personas');
            $table->integer('precio_total');
            $table->string('hora_reserva', 5); // HH:mm
            $table->string('fecha_reserva', 10); //DD-MM-YYYY
            $table->integer('id_estado'); 
            $table->timestamps(); // created_at y updated_at

            // DEFINICIÓN, CLAVES FORÁNEAS
            $table->foreign('id_cliente')->references('id')->on('personas')->onDelete('cascade');
            $table->foreign('id_servicio')->references('id')->on('servicios')->onDelete('cascade');
            $table->foreign('id_estado')->references('id')->on('estados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservas');
    }
};
