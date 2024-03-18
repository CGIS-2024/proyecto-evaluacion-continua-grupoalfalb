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
                'instrucciones_especificas' => "Menu para un minuvalido",
                'fecha' => "12/03/2024",
            ],
            [
                'instrucciones_especificas' => "Menu 2",
                'fecha' => "13/03/2024",
            ],
        ]);
    }
}
