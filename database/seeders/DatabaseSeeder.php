<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Llama a otros seeders aquí, por ejemplo:
        $this->call([
            EstadisticasGlobalesSeeder::class,
            EstadisticasSimplesSeeder::class,
            EstadosSeeder::class,
            PersonasSeeder::class,
            PromocionesSeeder::class,
            ReservasSeeder::class,
            RolesSeeder::class,
            ServicioJumpingSeeder::class,
            ServicioKartsSeeder::class,
            ServicioPaintballSeeder::class,
            ServicioRecreativosSeeder::class,
            ServicioRestauranteSeeder::class,
            ServiciosSeeder::class,
        ]);
    }
}
