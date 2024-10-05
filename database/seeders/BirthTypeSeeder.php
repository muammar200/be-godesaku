<?php

namespace Database\Seeders;

use App\Models\BirthType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BirthTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Kelahiran dalam perkawinan sah (Nama ayah dan ibu tercantum)',
            'Kelahiran dalam perkawinan belum tercatat, namun tercantum sebagai suami istri di KK (Nama ayah dan ibu tercantum)',
            'Kelahiran dalam perkawinan belum tercatat, tidak tercantum sebagai suami istri di KK (Hanya nama ibu tercantum)',
            'Kelahiran tanpa diketahui asal usul atau orang tua (Nama ayah dan ibu tidak tercantum)',
        ];

        foreach ($items as $item) {
            BirthType::create([
                "name" => $item,
            ]);
        }
    }
}
