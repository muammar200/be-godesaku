<?php

namespace Database\Seeders;

use App\Models\MarriageDivorce;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MarriageDivorceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 100; $i++) {
            MarriageDivorce::create([
                'master_population_id' => $i,
                'marital_status_id' => rand(1, 6),
            ]);
        }
    }
}
