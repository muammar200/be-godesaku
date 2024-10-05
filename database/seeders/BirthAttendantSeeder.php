<?php

namespace Database\Seeders;

use App\Models\BirthAttendant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BirthAttendantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Dokter',
            'Bidan/Perawat',
        ];

        foreach ($items as $item) {
            BirthAttendant::create([
                "name" => $item,
            ]);
        }
    }
}
