<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menus')->insert([
            [
                'instrucciones_especificas' => "Menú vegetariano para cena",
                'dietista_id' => 1,

            ],
            [
                'instrucciones_especificas' => "Menu rico en fibra para almuerzo",
                'dietista_id' => 2,

            ],
        ]);

        DB::table('menu_plato')->insert([
            [
                'menu_id' => 1,
                'plato_id' => 1

            ],
            [
                'plato_id' => 2,
                'menu_id' => 2            ],

        ]);


    }
}
