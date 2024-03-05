<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    { //ESTO ESTA MAL HAY QUE METERLO EN USERSEEDER
        DB::table('users')->insert([
            [
                'name' => "Administrador Alfonso",
                'email' => "adm_alfonso@administrador.com",
                'password' => Hash::make('12345678'),
            ],
            [
                'name' => "Administrador Alberto",
                'email' => "adm_alberto@administrador.com",
                'password' => Hash::make('12345678'),
            ],

        ]);
    }
}
