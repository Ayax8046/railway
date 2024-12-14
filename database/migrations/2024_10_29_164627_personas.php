<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path=/database/migrations/2024_10_29_164627_personas.php
     */
    public function up(): void
    {
        Schema::create('personas', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nombre', 25); 
            $table->string('apellidos', 50); 
            $table->string('email', 50)->unique(); 
            $table->string('usuario', 25)->unique(); 
            $table->string('contraseña', 25); 
            $table->date('fecha_nacimiento'); 
        
            // COLUMNAS, CLAVES FORÁNEAS
            $table->unsignedBigInteger('id_rol'); 
            $table->unsignedBigInteger('id_promo'); 
        
            $table->timestamps(); // created_at y updated_at
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
