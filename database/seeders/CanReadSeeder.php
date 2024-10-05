<?php

namespace Database\Seeders;

use App\Models\CanRead;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CanReadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CanRead::create([
            "name" => "Ya",
        ]);
        CanRead::create([
            "name" => "Tidak",
        ]);
    }
}
