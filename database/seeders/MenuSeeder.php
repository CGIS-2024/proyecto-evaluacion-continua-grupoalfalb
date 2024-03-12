<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('menu')->insert([
            [
                'instrucciones_especificas' => "Menu para un minuvalido",
                'fecha' => "12/03/2024",
            ]
            ],
        );
    }
}
