<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=EstadosSeeder
     */
    public function run(): void
    {
        DB::table('estados')->insert([
            [
                'nombre' => 'Reservado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Pagado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Cancelado',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Sin Respuesta',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
