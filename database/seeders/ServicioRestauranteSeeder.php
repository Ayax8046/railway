<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioRestauranteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ServicioRestauranteSeeder
     */
    public function run(): void
    {
        DB::table('servicio_restaurante')->insert([
            [
                'nombre' => 'Menu Pollo',
                'precio' => '5.95',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Menu Parrilla',
                'precio' => '6.95',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Menu Perrito',
                'precio' => '3.50',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Nuggets',
                'precio' => '4.5',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
