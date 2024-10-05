<?php

namespace Database\Seeders;

use App\Models\ExitType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ExitTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ExitType::create([
            "name" => "-",
        ]);
        ExitType::create([
            "name" => "Meninggal Dunia",
        ]);
        ExitType::create([
            "name" => "Pindah Keluar",
        ]);
        ExitType::create([
            "name" => "Dicabut Kewarganegaraan",
        ]);
        ExitType::create([
            "name" => "Dihapus Karena Duplikasi Data",
        ]);
    }
}
