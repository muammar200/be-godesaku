<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductionLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('production_levels')->insert([
            [
                'level' => 1,
                'production_unit' => 'Ton/Tahun',
            ],
            [
                'level' => 2,
                'production_unit' => 'Kg/Tahun',
            ],
        ]);
    }
}
