<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioJumpingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=ServicioJumpingSeeder
     */
    public function run(): void
    {
        DB::table('servicio_jumping')->insert([
            [
                'nombre' => 'JumpTime',
                'precio' => '14',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'JumpTime',
                'precio' => '24',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nombre' => 'JumpTime',
                'precio' => '34',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
