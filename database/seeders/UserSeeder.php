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
                'dni' => '12345678A',
                'direccion' => 'Direccion prueba 1',
                'genero' => 'Hombre',
                'email' => "adm_alberto@administrador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Dietista 1",
                'apellidos' => 'Diet',
                'fecha_nacimiento' => '13/6/1992',
                'dni' => '12345678A',
                'direccion' => 'Direccion prueba 1',
                'genero' => "Mujer",
                'email' => "diet1@admidietista.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Dietista 2",
                'apellidos' => 'Gutierrez',
                'fecha_nacimiento' => '08/01/1994',
                'dni' => '12345670Z',
                'direccion' => 'Direccion prueba 2',
                'genero' => "Hombre",
                'email' => "diet2@admidietista.com",
                'password' => Hash::make('12345678'),
            ],
        ]);
    }
}
