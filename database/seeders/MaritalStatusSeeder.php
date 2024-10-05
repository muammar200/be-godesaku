<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MaritalStatus::create([
            "name" => "Belum Kawin",
        ]);   
        MaritalStatus::create([
            "name" => "Kawin",
        ]);   
        MaritalStatus::create([
            "name" => "Cerai Hidup",
        ]);   
        MaritalStatus::create([
            "name" => "Cerai Mati",
        ]);   
        MaritalStatus::create([
            "name" => "Kawin Tercatat",
        ]);   
        MaritalStatus::create([
            "name" => "Kawin Tidak Tercatat",
        ]);   
    }
}
