<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * php artisan migrate --path=/database/migrations/2024_10_29_185531_servicio_karting.php
     */
    public function up(): void
    {
        Schema::create('servicio_karting', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('nombre', 25); 
            $table->integer('precio');
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_karting');
    }
};
