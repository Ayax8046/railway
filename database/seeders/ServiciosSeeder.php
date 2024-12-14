<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiciosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ServiciosSeeder
     */
    public function run(): void
    {
        DB::table('servicios')->insert([
            [
                'nombre' => 'Karts',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Jumping',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Paintball',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Restaurante',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Recreativos',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
