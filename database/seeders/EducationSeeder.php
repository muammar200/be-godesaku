<?php

namespace Database\Seeders;

use App\Models\Education;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Education::create([
            "name" => "Tidak/Belum Sekolah",
        ]);
        Education::create([
            "name" => "Belum Tamat SD/Sederajat",
        ]);
        Education::create([
            "name" => "Tamat SD/Sederajat",
        ]);
        Education::create([
            "name" => "SLTP/Sederajat",
        ]);
        Education::create([
            "name" => "SLTA/Sederajat",
        ]);
        Education::create([
            "name" => "Diploma I/II",
        ]);
        Education::create([
            "name" => "Akademi/Diploma III/Sarjana Muda",
        ]);
        Education::create([
            "name" => "Diploma IV/Strata I",
        ]);
        Education::create([
            "name" => "Strata II",
        ]);
        Education::create([
            "name" => "Strata III",
        ]);
    }
}
