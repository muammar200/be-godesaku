<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IdmIndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [1, 2, 3]; // Assume 1 = IKS, 2 = IKE, 3 = IKL

        foreach ($categories as $categoryId) {
            for ($i = 1; $i <= 15; $i++) {
                DB::table('idm_indicators')->insert([
                    'idm_indicator_category_id' => $categoryId,
                    'year' => 2023,
                    'indicator' => "Text",
                    'score' => rand(50, 100),
                    'description' => "Text",
                    'activity' => "Text",
                    'grade' => rand(50, 100) + rand(0, 99) / 100, // Example: 75.23
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
