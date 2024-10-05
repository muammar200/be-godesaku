<?php

namespace Database\Seeders;

use App\Models\Dusun;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DusunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dusun::create([
            "name" => "Dusun A",
        ]);
        Dusun::create([
            "name" => "Dusun B",
        ]);
        Dusun::create([
            "name" => "Dusun C",
        ]);
    }
}
