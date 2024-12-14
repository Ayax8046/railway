<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioPaintballSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ServicioPaintballSeeder
     */
    public function run(): void
    {
        DB::table('servicio_paintball')->insert([ 
            [
                'nombre' => 'Oferta 1',
                'precio' => '20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Oferta 2',
                'precio' => '25',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Oferta 3',
                'precio' => '30',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Oferta 4',
                'precio' => '35',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Oferta 5',
                'precio' => '50',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'Oferta 6',
                'precio' => '60',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
