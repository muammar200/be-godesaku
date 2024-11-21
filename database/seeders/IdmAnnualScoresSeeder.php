<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IdmAnnualScoresSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('idm_annual_scores')->insert([
            [
                'year' => 2024,
                'score' => 95,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2023,
                'score' => 88,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2022,
                'score' => 82,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2021,
                'score' => 78,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2020,
                'score' => 70,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
