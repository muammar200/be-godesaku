<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivityImplementerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch all indicator IDs
        $indicators = DB::table('idm_indicators')->get();

        foreach ($indicators as $indicator) {
            DB::table('activity_implementers')->insert([
                'idm_indicator_id' => $indicator->id,
                'pusat' => "-",
                'provinsi' => "-",
                'kab' => "-",
                'desa' => "-",
                'csr' => "-",
                'others' => "-",
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
