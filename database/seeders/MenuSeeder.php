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
            [
                'instrucciones_especificas' => "Menú específico sin gluten",
                'dietista_id' => 3,

            ],
            [
                'instrucciones_especificas' => "Menú alto en proteínas",
                'dietista_id' => 4,

            ],
            [
                'instrucciones_especificas' => "Menú con pescado y verduras",
                'dietista_id' => 4,

            ],
        ]);

        DB::table('menu_plato')->insert([
            [
                'menu_id' => 1,
                'plato_id' => 1

            ],
            [
                'plato_id' => 2,
                'menu_id' => 2
            ],
            [
                'plato_id' => 3,
                'menu_id' => 5
            ],
            [
                'plato_id' => 1,
                'menu_id' => 5
            ],
            [
                'plato_id' => 7,
                'menu_id' => 5
            ],

        ]);


    }
}
