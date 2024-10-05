<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Religion::create([
            "name" => "Islam",
        ]);
        Religion::create([
            "name" => "Kristen Protestan",
        ]);
        Religion::create([
            "name" => "Kristen Katolik",
        ]);
        Religion::create([
            "name" => "Hindu",
        ]);
        Religion::create([
            "name" => "Buddha",
        ]);
        Religion::create([
            "name" => "Konghucu",
        ]);
        Religion::create([
            "name" => "Lainnya",
        ]);
    }
}
