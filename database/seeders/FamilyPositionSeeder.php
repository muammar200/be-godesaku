<?php

namespace Database\Seeders;

use App\Models\FamilyPosition;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FamilyPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $family_positions = [
            'Kepala Keluarga',
            'Suami',
            'Istri',
            'Anak',
            'Menantu',
            'Cucu',
            'Orangtua',
            'Mertua',
            'Famili Lain',
            'Pembantu',
            'Lainnya'
        ];


        foreach ($family_positions as $item) {
            FamilyPosition::create([
                "name" => $item,
            ]);
        }
    }
}
