<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BansosReceiverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 300; $i++) {
            DB::table('bansos_receivers')->insert([
                'master_population_id' => rand(1, 100), // Acak antara id 1 - 100
                'bansos_id' => rand(1, 8), // Acak antara id 1 - 8
                'description' => 'Description for receiver ' . $i,
                'amount' => rand(10000, 100000), // Nominal acak antara 10,000 sampai 100,000
                'period' => now()->subMonths(rand(0, 12)), // Periode acak antara bulan-bulan sebelumnya
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
