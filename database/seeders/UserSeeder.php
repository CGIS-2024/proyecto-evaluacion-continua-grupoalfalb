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
        ]);
    }
}
