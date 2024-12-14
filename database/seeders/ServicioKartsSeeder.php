<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioKartsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ServicioKartsSeeder
     */
    public function run(): void
    {
        DB::table('servicio_karting')->insert([
            [
                'nombre' => 'Senior',
                'precio' => '18',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Senior',
                'precio' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Plus',
                'precio' => '20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Plus',
                'precio' => '35',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Extreme',
                'precio' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ]
            ,
            [
                'nombre' => 'Extreme',
                'precio' => '55',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
