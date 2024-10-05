<?php

namespace Database\Seeders;

use App\Models\Time;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'WIB',
            'WITA',
            'WIT',
        ];

        foreach ($items as $item) {
            Time::create([
                "name" => $item,
            ]);
        }
    }
}
