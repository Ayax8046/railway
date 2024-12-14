<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=RolesSeeder
     */
    public function run(): void
    {
        DB::table('roles')->insert([
            [
                'descripcion' => 'Cliente',
                'nivel_acceso' => 0,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'descripcion' => 'Trabajador',
                'nivel_acceso' => 1,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'descripcion' => 'Administrador',
                'nivel_acceso' => 2,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
