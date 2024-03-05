<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
                'fecha_nacimiento' => '',
                'dni' => '12345678A',
                'direccion' => 'Direccion prueba 1',
                'genero' => 'Hombre',
                'email' => "adm_alberto@administrador.com",
                'password' => Hash::make('12345678'),
            ],

        ]);
    }
}
