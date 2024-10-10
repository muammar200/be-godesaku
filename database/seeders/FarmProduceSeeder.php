<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FarmProduceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('farm_produces')->insert([
            [
                'name' => 'Padi',
                'quantity' => 150.50,
                'production_level_id' => 1, // Ton
                'icon' => 'padi_icon.png',
            ],
            [
                'name' => 'Jagung',
                'quantity' => 250.75,
                'production_level_id' => 2, // Kuintal
                'icon' => 'padi_icon.png',
            ],
            [
                'name' => 'Kedelai',
                'quantity' => 350.00,
                'production_level_id' => 3, // Kilogram
                'icon' => 'padi_icon.png',
            ],
            [
                'name' => 'Kopi',
                'quantity' => 120.25,
                'production_level_id' => 1, // Ton
                'icon' => 'padi_icon.png',
            ],
            [
                'name' => 'Teh',
                'quantity' => 80.10,
                'production_level_id' => 3, // Kilogram
                'icon' => 'jagung_icon.png',
            ],
            [
                'name' => 'Kelapa Sawit',
                'quantity' => 400.00,
                'production_level_id' => 1, // Ton
                'icon' => 'jagung_icon.png',
            ],
            [
                'name' => 'Tebu',
                'quantity' => 600.75,
                'production_level_id' => 2, // Kuintal
                'icon' => 'jagung_icon.png',
            ],
            [
                'name' => 'Singkong',
                'quantity' => 500.00,
                'production_level_id' => 2, // Kuintal
                'icon' => 'jagung_icon.png',
            ],
            [
                'name' => 'Kacang Tanah',
                'quantity' => 220.30,
                'production_level_id' => 3, // Kilogram
                'icon' => 'jagung_icon.png',
            ],
            [
                'name' => 'Bawang Merah',
                'quantity' => 180.20,
                'production_level_id' => 3, // Kilogram
                'icon' => 'jagung_icon.png',
            ],
            [
                'name' => 'Bawang Putih',
                'quantity' => 190.15,
                'production_level_id' => 3, // Kilogram
                'icon' => 'jagung_icon.png',
            ],
            [
                'name' => 'Cabai Merah',
                'quantity' => 300.60,
                'production_level_id' => 2, // Kuintal
                'icon' => 'jagung_icon.png',
            ],
        ]);
    }
}
