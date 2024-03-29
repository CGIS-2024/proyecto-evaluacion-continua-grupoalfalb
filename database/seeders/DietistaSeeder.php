<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class DietistaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('dietistas')->insert([
            [
                'nuhsa' => "AN1234567890",
                'fecha_contratacion' => "24/7/2023",
                'user_id' => 3,

            ],
            [
                'nuhsa' => "AN1234987654",
                'fecha_contratacion' => "12/9/2023",
                'user_id' => 4,

            ],
        ]);
    }
}
