<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IdmInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('idm_info')->insert([
            [
                'year' => 2024,
                'status' => 'Mandiri',
                'total_score' => 95,
                'target_status' => 'Mandiri',
                'minimum_score' => 90,
                'increment' => 5,
                'iks_score' => 92.4567,
                'ike_score' => 93.1234,
                'ikl_score' => 94.5678,
                'status_icon' => 'status_icon.png',
                'total_score_icon' => 'total_score_icon.png',
                'target_status_icon' => 'target_status_icon.png',
                'minimum_score_icon' => 'minimum_score_icon.png',
                'increment_icon' => 'increment_icon.png',
                'iks_score_icon' => 'iks_score_icon.png',
                'ike_score_icon' => 'ike_score_icon.png',
                'ikl_score_icon' => 'ikl_score_icon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2023,
                'status' => 'Maju',
                'total_score' => 80,
                'target_status' => 'Mandiri',
                'minimum_score' => 85,
                'increment' => 5,
                'iks_score' => 81.2345,
                'ike_score' => 82.3456,
                'ikl_score' => 83.4567,
                'status_icon' => 'status_icon.png',
                'total_score_icon' => 'total_score_icon.png',
                'target_status_icon' => 'target_status_icon.png',
                'minimum_score_icon' => 'minimum_score_icon.png',
                'increment_icon' => 'increment_icon.png',
                'iks_score_icon' => 'iks_score_icon.png',
                'ike_score_icon' => 'ike_score_icon.png',
                'ikl_score_icon' => 'ikl_score_icon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'year' => 2022,
                'status' => 'Berkembang',
                'total_score' => 65,
                'target_status' => 'Maju',
                'minimum_score' => 70,
                'increment' => 5,
                'iks_score' => 66.1234,
                'ike_score' => 67.2345,
                'ikl_score' => 68.3456,
                'status_icon' => 'status_icon.png',
                'total_score_icon' => 'total_score_icon.png',
                'target_status_icon' => 'target_status_icon.png',
                'minimum_score_icon' => 'minimum_score_icon.png',
                'increment_icon' => 'increment_icon.png',
                'iks_score_icon' => 'iks_score_icon.png',
                'ike_score_icon' => 'ike_score_icon.png',
                'ikl_score_icon' => 'ikl_score_icon.png',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
