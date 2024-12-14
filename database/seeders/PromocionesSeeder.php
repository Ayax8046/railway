<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PromocionesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=PromocionesSeeder
     */
    public function run(): void
    {
        DB::table('promociones')->insert([
            [
                'nombre' => 'WORKERS',
                'descuento' => '50',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'BIENVENIDO',
                'descuento' => '10',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'SOCIO',
                'descuento' => '35',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'PROMO-1',
                'descuento' => '15',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'PROMO-2',
                'descuento' => '20',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'PROMO-3',
                'descuento' => '25',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
