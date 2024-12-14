<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioRecreativosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ServicioRecreativosSeeder
     */
    public function run(): void
    {
        DB::table('servicio_recreativos')->insert([
            [
                'nombre' => 'Oferta 1',
                'precio' => '10',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
