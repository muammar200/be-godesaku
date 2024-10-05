<?php

namespace Database\Seeders;

use App\Models\Civic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CivicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Civic::create([
            "name" => "WNI",
        ]);
        Civic::create([
            "name" => "WNA",
        ]);
    }
}
