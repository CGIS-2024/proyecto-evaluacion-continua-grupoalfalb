<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => "Administrador Alfonso",
                'apellidos' => 'Ibañez Rodriguez',
                'fecha_nacimiento' => '20/11/1998',
                'dni' => '12345678A',
                'direccion' => 'Direccion prueba 1',
                'genero' => "Hombre",
                'email' => "adm_alfonso@administrador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Administrador Alberto",
                'apellidos' => 'Garcia Marmol',
                'fecha_nacimiento' => '04/08/2002',
                'dni' => '12345678B',
                'direccion' => 'Direccion prueba 1',
                'genero' => 'Hombre',
                'email' => "adm_alberto@administrador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Dietista 1",
                'apellidos' => 'Diet',
                'fecha_nacimiento' => '13/6/1992',
                'dni' => '12345678C',
                'direccion' => 'Direccion prueba 1',
                'genero' => "Mujer",
                'email' => "diet1@admidietista.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Claudia",
                'apellidos' => 'Heredia Cerrato',
                'fecha_nacimiento' => '12/09/2002',
                'dni' => '29505467W',
                'direccion' => 'C/Asunción, 57, 2A',
                'genero' => "Mujer",
                'email' => "ccheredia@dietista.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Juan",
                'apellidos' => 'Pérez Gómez',
                'fecha_nacimiento' => '30/04/1995',
                'dni' => '33926194S',
                'direccion' => 'C/Reina Mercedes, 4, 6A',
                'genero' => "Hombre",
                'email' => "juanpe@paciente.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "María",
                'apellidos' => 'López García',
                'fecha_nacimiento' => '15/09/1988',
                'dni' => '48573928T',
                'direccion' => 'Avda. Constitución, 20, 3B',
                'genero' => "Mujer",
                'email' => "marialg@paciente.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Jesús",
                'apellidos' => 'Medina Villalba',
                'fecha_nacimiento' => '01/04/1985',
                'dni' => '736452635T',
                'direccion' => 'C/Isador Duncan, 53',
                'genero' => "Hombre",
                'email' => "jesus@dietista.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Patricia",
                'apellidos' => 'López Media',
                'fecha_nacimiento' => '17/12/2002',
                'dni' => '837264919U',
                'direccion' => 'Cornisa Azul, 12, 4A',
                'genero' => "Mujer",
                'email' => "patri@dietista.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Paula",
                'apellidos' => 'Suero Collado',
                'fecha_nacimiento' => '12/10/2000',
                'dni' => '837324519L',
                'direccion' => 'Mariana de pineda, 23',
                'genero' => "Mujer",
                'email' => "Paula@paciente.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Manuel",
                'apellidos' => 'Lagares Luna',
                'fecha_nacimiento' => '01/02/1972',
                'dni' => '987892123B',
                'direccion' => 'Virgen de luján, 28',
                'genero' => "Hombre",
                'email' => "Manuel@paciente.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Victor Manuel",
                'apellidos' => 'Martín Roldán',
                'fecha_nacimiento' => '11/09/1965',
                'dni' => '635462734E',
                'direccion' => 'America, 6',
                'genero' => "Hombre",
                'email' => "VictorManuel@paciente.com",
                'password' => Hash::make('12345678'),
            ],

        ]);
    }
}
