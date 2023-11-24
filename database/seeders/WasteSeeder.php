<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WasteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('waste')->insert([
            'date' => now(),
            'number_car' => 'AO123E177',
            'is_exactly' => true,
            'wood' => 70,
            'dirt' => 30,
            'concrete' => 0,
            'brick' => 0,
            'is_awning' => false,
            'statement' => 'wood',
            'created_at' => now(),
        ]);
    }
}
