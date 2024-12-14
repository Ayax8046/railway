<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * php artisan db:seed --class=PersonasSeeder
     */
    public function run(): void
    {
        DB::table('personas')->insert([
            
            // 2 - RANGO ADMIN
            [
                'nombre' => 'Maria',
                'apellidos' => 'Garcia',
                'email' => 'maria.garcia@example.com',
                'fecha_nacimiento' => '1980-05-29',
                'usuario' => 'maria.garcia',
                'contraseña' => 'admin',
                'id_rol' => '2',
                'id_promo' => '1'
            ],
            [
                'nombre' => 'Maria',
                'apellidos' => 'Lozano',
                'email' => 'maria.lozano@example.com',
                'fecha_nacimiento' => '1981-07-19',
                'usuario' => 'maria.lozano',
                'contraseña' => 'admin',
                'id_rol' => '2',
                'id_promo' => '1'
            ],
            [ // 8 - RANGOS TRABAJADOR
                'nombre' => 'Maria',
                'apellidos' => 'Manzano',
                'email' => 'maria.manzano@example.com',
                'fecha_nacimiento' => '1986-11-10',
                'usuario' => 'maria.manzano',
                'contraseña' => 'trabajador',
                'id_rol' => '1',
                'id_promo' => '1'
            ],
            [
                'nombre' => 'Lucia',
                'apellidos' => 'Perez',
                'email' => 'lucia.perez@example.com',
                'fecha_nacimiento' => '1985-05-15',
                'usuario' => 'lucia.perez',
                'contraseña' => 'trabajador',
                'id_rol' => '1',
                'id_promo' => '1'
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Rodriguez',
                'email' => 'pedro.rodriguez@example.com',
                'fecha_nacimiento' => '1982-09-20',
                'usuario' => 'pedro.rodriguez',
                'contraseña' => 'trabajador',
                'id_rol' => '1',
                'id_promo' => '1'
            ],
            [
                'nombre' => 'Paula',
                'apellidos' => 'Martinez',
                'email' => 'paula.martinez@example.com',
                'fecha_nacimiento' => '1985-05-15',
                'usuario' => 'paula.martinez',
                'contraseña' => 'trabajador',
                'id_rol' => '1',
                'id_promo' => '1'
            ],
            [
                'nombre' => 'Pablo',
                'apellidos' => 'Perez',
                'email' => 'pablo.perez@example.com',
                'fecha_nacimiento' => '1990-08-11',
                'usuario' => 'pablo.perez',
                'contraseña' => 'trabajador',
                'id_rol' => '1',
                'id_promo' => '1'
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Solis',
                'email' => 'pedro.solis@example.com',
                'fecha_nacimiento' => '1990-02-04',
                'usuario' => 'pedro.solis',
                'contraseña' => 'trabajador',
                'id_rol' => '1',
                'id_promo' => '1'
            ],
            [
                'nombre' => 'Lucia',
                'apellidos' => 'Gonzalez',
                'email' => 'lucia.gonzalez@example.com',
                'fecha_nacimiento' => '1980-08-13',
                'usuario' => 'lucia.gonzalez',
                'contraseña' => 'trabajador',
                'id_rol' => '1',
                'id_promo' => '1'
            ],
            [
                'nombre' => 'Irene',
                'apellidos' => 'Gonzalez',
                'email' => 'irene.gonzalez@example.com',
                'fecha_nacimiento' => '1994-12-08',
                'usuario' => 'irene.gonzalez',
                'contraseña' => 'trabajador',
                'id_rol' => '1',
                'id_promo' => '1'
            ],
            [ // 90 - CLIENTES
                'nombre' => 'Juan',
                'apellidos' => 'Sanchez',
                'email' => 'juan.sanchez@example.com',
                'fecha_nacimiento' => '1985-11-26',
                'usuario' => 'juan.sanchez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Sofia',
                'apellidos' => 'Ramirez',
                'email' => 'sofia.ramirez@example.com',
                'fecha_nacimiento' => '1984-08-20',
                'usuario' => 'sofia.ramirez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Ramirez',
                'email' => 'carlos.ramirez@example.com',
                'fecha_nacimiento' => '1992-04-17',
                'usuario' => 'carlos.ramirez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Manzano',
                'email' => 'juan.manzano@example.com',
                'fecha_nacimiento' => '1996-01-05',
                'usuario' => 'juan.manzano',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Torres',
                'email' => 'juan.torres@example.com',
                'fecha_nacimiento' => '1990-05-01',
                'usuario' => 'juan.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Rodriguez',
                'email' => 'jose.rodriguez@example.com',
                'fecha_nacimiento' => '1997-07-16',
                'usuario' => 'jose.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Lucia',
                'apellidos' => 'Rodriguez',
                'email' => 'lucia.rodriguez@example.com',
                'fecha_nacimiento' => '1994-04-28',
                'usuario' => 'lucia.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Lopez',
                'email' => 'pedro.lopez@example.com',
                'fecha_nacimiento' => '1994-06-30',
                'usuario' => 'pedro.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Ramirez',
                'email' => 'pedro.ramirez@example.com',
                'fecha_nacimiento' => '1996-03-10',
                'usuario' => 'pedro.ramirez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Maria',
                'apellidos' => 'Torres',
                'email' => 'maria.torres@example.com',
                'fecha_nacimiento' => '1998-05-12',
                'usuario' => 'maria.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Lucia',
                'apellidos' => 'Garcia',
                'email' => 'lucia.garcia@example.com',
                'fecha_nacimiento' => '1990-04-03',
                'usuario' => 'lucia.garcia',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Garcia',
                'email' => 'luis.garcia@example.com',
                'fecha_nacimiento' => '1995-10-02',
                'usuario' => 'luis.garcia',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Sanchez',
                'email' => 'carlos.sanchez@example.com',
                'fecha_nacimiento' => '1997-09-14',
                'usuario' => 'carlos.sanchez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Hernandez',
                'email' => 'juan.hernandez@example.com',
                'fecha_nacimiento' => '1993-08-30',
                'usuario' => 'juan.hernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Maria',
                'apellidos' => 'Martinez',
                'email' => 'maria.martinez@example.com',
                'fecha_nacimiento' => '1996-05-20',
                'usuario' => 'maria.martinez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '2'
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Rodriguez',
                'email' => 'carlos.rodriguez@example.com',
                'fecha_nacimiento' => '1996-12-07',
                'usuario' => 'carlos.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Sofia',
                'apellidos' => 'Hernandez',
                'email' => 'sofia.hernandez@example.com',
                'fecha_nacimiento' => '1999-01-29',
                'usuario' => 'sofia.hernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Sofia',
                'apellidos' => 'Perez',
                'email' => 'sofia.perez@example.com',
                'fecha_nacimiento' => '1997-02-11',
                'usuario' => 'sofia.perez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Torres',
                'email' => 'ana.torres@example.com',
                'fecha_nacimiento' => '1993-10-06',
                'usuario' => 'ana.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Hernandez',
                'email' => 'ana.hernandez@example.com',
                'fecha_nacimiento' => '1991-08-28',
                'usuario' => 'ana.hernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Sofia',
                'apellidos' => 'Garcia',
                'email' => 'sofia.garcia@example.com',
                'fecha_nacimiento' => '1994-04-23',
                'usuario' => 'sofia.garcia',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Torres',
                'email' => 'luis.torres@example.com',
                'fecha_nacimiento' => '1998-04-02',
                'usuario' => 'luis.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Manuel',
                'apellidos' => 'Gonzalez',
                'email' => 'manuel.gonzalez@example.com',
                'fecha_nacimiento' => '1997-01-11',
                'usuario' => 'manuel.gonzalez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Carmen',
                'apellidos' => 'Gonzalez',
                'email' => 'carmen.gonzalez@example.com',
                'fecha_nacimiento' => '1992-08-25',
                'usuario' => 'carmen.gonzalez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Lucia',
                'apellidos' => 'Martinez',
                'email' => 'lucia.martinez@example.com',
                'fecha_nacimiento' => '1995-09-16',
                'usuario' => 'lucia.martinez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '3'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Perez',
                'email' => 'juan.perez@example.com',
                'fecha_nacimiento' => '1999-07-22',
                'usuario' => 'juan.perez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Carmen',
                'apellidos' => 'Garcia',
                'email' => 'carmen.garcia@example.com',
                'fecha_nacimiento' => '1992-08-15',
                'usuario' => 'carmen.garcia',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Martinez',
                'email' => 'jose.martinez@example.com',
                'fecha_nacimiento' => '1990-04-19',
                'usuario' => 'jose.martinez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Hernandez',
                'email' => 'jose.hernandez@example.com',
                'fecha_nacimiento' => '1996-01-05',
                'usuario' => 'jose.hernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Maria',
                'apellidos' => 'Rodriguez',
                'email' => 'maria.rodriguez@example.com',
                'fecha_nacimiento' => '1998-11-08',
                'usuario' => 'maria.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Manoli',
                'apellidos' => 'Gonzalez',
                'email' => 'manoli.gonzalez@example.com',
                'fecha_nacimiento' => '1999-10-10',
                'usuario' => 'manoli.gonzalez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Lucia',
                'apellidos' => 'Fernandez',
                'email' => 'lucia.fernandez@example.com',
                'fecha_nacimiento' => '1996-06-30',
                'usuario' => 'lucia.fernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Maria',
                'apellidos' => 'Gonzalez',
                'email' => 'maria.gonzalez@example.com',
                'fecha_nacimiento' => '1993-10-22',
                'usuario' => 'maria.gonzalez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Gonzalez',
                'email' => 'carlos.gonzalez@example.com',
                'fecha_nacimiento' => '1996-11-14',
                'usuario' => 'carlos.gonzalez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Daniel',
                'apellidos' => 'Rodriguez',
                'email' => 'daniel.rodriguez@example.com',
                'fecha_nacimiento' => '1999-11-06',
                'usuario' => 'daniel.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Mateo',
                'apellidos' => 'Hernandez',
                'email' => 'mateo.hernandez@example.com',
                'fecha_nacimiento' => '1993-04-04',
                'usuario' => 'mateo.hernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Carmen',
                'apellidos' => 'Lopez',
                'email' => 'carmen.lopez@example.com',
                'fecha_nacimiento' => '1995-03-27',
                'usuario' => 'carmen.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Garcia',
                'email' => 'jose.garcia@example.com',
                'fecha_nacimiento' => '1993-09-06',
                'usuario' => 'jose.garcia',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Rodriguez',
                'email' => 'ana.rodriguez@example.com',
                'fecha_nacimiento' => '1990-11-17',
                'usuario' => 'ana.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Lucas',
                'apellidos' => 'Lopez',
                'email' => 'lucas.lopez@example.com',
                'fecha_nacimiento' => '1990-11-27',
                'usuario' => 'lucas.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Gonzalez',
                'email' => 'pedro.gonzalez@example.com',
                'fecha_nacimiento' => '1995-05-31',
                'usuario' => 'pedro.gonzalez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Perez',
                'email' => 'carlos.perez@example.com',
                'fecha_nacimiento' => '1994-04-30',
                'usuario' => 'carlos.perez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Daniel',
                'apellidos' => 'Lopez',
                'email' => 'daniel.lopez@example.com',
                'fecha_nacimiento' => '1999-05-17',
                'usuario' => 'daniel.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Sanchez',
                'email' => 'jose.sanchez@example.com',
                'fecha_nacimiento' => '1995-01-15',
                'usuario' => 'jose.sanchez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Ramirez',
                'email' => 'luis.ramirez@example.com',
                'fecha_nacimiento' => '1995-05-11',
                'usuario' => 'luis.ramirez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '4'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Frisol',
                'email' => 'juan.frisol@example.com',
                'fecha_nacimiento' => '1990-10-07',
                'usuario' => 'juan.frisol',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Lucia',
                'apellidos' => 'Lopez',
                'email' => 'lucia.lopez@example.com',
                'fecha_nacimiento' => '1994-09-07',
                'usuario' => 'lucia.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Gavi',
                'apellidos' => 'Torres',
                'email' => 'gavi.torres@example.com',
                'fecha_nacimiento' => '1991-05-28',
                'usuario' => 'gavi.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Lopez',
                'email' => 'juan.lopez@example.com',
                'fecha_nacimiento' => '1995-12-19',
                'usuario' => 'juan.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Ana',
                'apellidos' => 'Lopez',
                'email' => 'ana.lopez@example.com',
                'fecha_nacimiento' => '1998-01-30',
                'usuario' => 'ana.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Raul',
                'apellidos' => 'Garcia',
                'email' => 'raul.garcia@example.com',
                'fecha_nacimiento' => '1992-03-21',
                'usuario' => 'raul.garcia',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Sofia',
                'apellidos' => 'Gonzalez',
                'email' => 'sofia.gonzalez@example.com',
                'fecha_nacimiento' => '1998-03-02',
                'usuario' => 'sofia.gonzalez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Perez',
                'email' => 'jose.perez@example.com',
                'fecha_nacimiento' => '1994-09-23',
                'usuario' => 'jose.perez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Carla',
                'apellidos' => 'Garcia',
                'email' => 'carla.garcia@example.com',
                'fecha_nacimiento' => '1996-01-07',
                'usuario' => 'carla.garcia',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Acosta',
                'email' => 'pedro.acosta@example.com',
                'fecha_nacimiento' => '1992-08-12',
                'usuario' => 'pedro.acosta',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Lucia',
                'apellidos' => 'Ramirez',
                'email' => 'lucia.ramirez@example.com',
                'fecha_nacimiento' => '1993-12-22',
                'usuario' => 'lucia.ramirez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Maria',
                'apellidos' => 'Gutierrez',
                'email' => 'maria.gutierrez@example.com',
                'fecha_nacimiento' => '1991-03-16',
                'usuario' => 'maria.gutierrez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Torres',
                'email' => 'jose.torres@example.com',
                'fecha_nacimiento' => '1999-05-22',
                'usuario' => 'jose.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Heredia',
                'email' => 'jose.heredia@example.com',
                'fecha_nacimiento' => '1997-06-05',
                'usuario' => 'jose.heredia',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Hernandez',
                'email' => 'luis.hernandez@example.com',
                'fecha_nacimiento' => '1990-04-11',
                'usuario' => 'luis.hernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Carmen',
                'apellidos' => 'Rodriguez',
                'email' => 'carmen.rodriguez@example.com',
                'fecha_nacimiento' => '1996-04-18',
                'usuario' => 'carmen.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Marta',
                'apellidos' => 'Rodriguez',
                'email' => 'marta.rodriguez@example.com',
                'fecha_nacimiento' => '1999-10-14',
                'usuario' => 'marta.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Rocio',
                'apellidos' => 'Ramirez',
                'email' => 'rocio.ramirez@example.com',
                'fecha_nacimiento' => '1998-05-06',
                'usuario' => 'rocio.ramirez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Maria',
                'apellidos' => 'Ramirez',
                'email' => 'maria.ramirez@example.com',
                'fecha_nacimiento' => '1999-11-21',
                'usuario' => 'maria.ramirez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Fernandez',
                'email' => 'juan.fernandez@example.com',
                'fecha_nacimiento' => '1991-06-27',
                'usuario' => 'juan.fernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Rodriguez',
                'email' => 'luis.rodriguez@example.com',
                'fecha_nacimiento' => '1990-12-04',
                'usuario' => 'luis.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Luis',
                'apellidos' => 'Lopez',
                'email' => 'luis.lopez@example.com',
                'fecha_nacimiento' => '1996-11-06',
                'usuario' => 'luis.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Raul',
                'apellidos' => 'Ramirez',
                'email' => 'raul.ramirez@example.com',
                'fecha_nacimiento' => '1991-08-22',
                'usuario' => 'raul.ramirez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Irene',
                'apellidos' => 'Lopez',
                'email' => 'irene.lopez@example.com',
                'fecha_nacimiento' => '1990-12-22',
                'usuario' => 'irene.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Carmen',
                'apellidos' => 'Solano',
                'email' => 'carmen.solano@example.com',
                'fecha_nacimiento' => '1996-05-26',
                'usuario' => 'carmen.solano',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '5'
            ],
            [
                'nombre' => 'Lucia',
                'apellidos' => 'Torres',
                'email' => 'lucia.torres@example.com',
                'fecha_nacimiento' => '1993-04-13',
                'usuario' => 'lucia.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Rodriguez',
                'email' => 'juan.rodriguez@example.com',
                'fecha_nacimiento' => '1993-04-15',
                'usuario' => 'juan.rodriguez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Sofia',
                'apellidos' => 'Martinez',
                'email' => 'sofia.martinez@example.com',
                'fecha_nacimiento' => '1991-07-24',
                'usuario' => 'sofia.martinez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Martinez',
                'email' => 'pedro.martinez@example.com',
                'fecha_nacimiento' => '1999-12-19',
                'usuario' => 'pedro.martinez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Garcia',
                'email' => 'juan.garcia@example.com',
                'fecha_nacimiento' => '1991-11-17',
                'usuario' => 'juan.garcia',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Lola',
                'apellidos' => 'Hernandez',
                'email' => 'lola.hernandez@example.com',
                'fecha_nacimiento' => '1995-11-13',
                'usuario' => 'lola.hernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Lopez',
                'email' => 'carlos.lopez@example.com',
                'fecha_nacimiento' => '1992-09-30',
                'usuario' => 'carlos.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Perez',
                'email' => 'pedro.perez@example.com',
                'fecha_nacimiento' => '1995-07-04',
                'usuario' => 'pedro.perez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Pedro',
                'apellidos' => 'Torres',
                'email' => 'pedro.torres@example.com',
                'fecha_nacimiento' => '1993-03-26',
                'usuario' => 'pedro.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Juan',
                'apellidos' => 'Gonzalez',
                'email' => 'juan.gonzalez@example.com',
                'fecha_nacimiento' => '1996-02-22',
                'usuario' => 'juan.gonzalez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Jose',
                'apellidos' => 'Rubio',
                'email' => 'jose.rubio@example.com',
                'fecha_nacimiento' => '1999-05-20',
                'usuario' => 'jose.rubio',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'David',
                'apellidos' => 'Sanchez',
                'email' => 'david.sanchez@example.com',
                'fecha_nacimiento' => '1994-06-21',
                'usuario' => 'david.sanchez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Laura',
                'apellidos' => 'Hernandez',
                'email' => 'laura.hernandez@example.com',
                'fecha_nacimiento' => '1996-09-30',
                'usuario' => 'laura.hernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Carmen',
                'apellidos' => 'Torres',
                'email' => 'carmen.torres@example.com',
                'fecha_nacimiento' => '1992-01-03',
                'usuario' => 'carmen.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Sofia',
                'apellidos' => 'Torres',
                'email' => 'sofia.torres@example.com',
                'fecha_nacimiento' => '1993-01-12',
                'usuario' => 'sofia.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Carmen',
                'apellidos' => 'Perez',
                'email' => 'carmen.perez@example.com',
                'fecha_nacimiento' => '1999-06-23',
                'usuario' => 'carmen.perez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Carlos',
                'apellidos' => 'Torres',
                'email' => 'carlos.torres@example.com',
                'fecha_nacimiento' => '1997-05-23',
                'usuario' => 'carlos.torres',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Paula',
                'apellidos' => 'Gonzalez',
                'email' => 'paula.gonzalez@example.com',
                'fecha_nacimiento' => '1999-10-08',
                'usuario' => 'paula.gonzalez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Maria',
                'apellidos' => 'Hernandez',
                'email' => 'maria.hernandez@example.com',
                'fecha_nacimiento' => '1998-06-02',
                'usuario' => 'maria.hernandez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ],
            [
                'nombre' => 'Sofia',
                'apellidos' => 'Lopez',
                'email' => 'sofia.lopez@example.com',
                'fecha_nacimiento' => '1995-02-02',
                'usuario' => 'sofia.lopez',
                'contraseña' => 'usuario',
                'id_rol' => '0',
                'id_promo' => '6'
            ]
        ]);
    }
}
