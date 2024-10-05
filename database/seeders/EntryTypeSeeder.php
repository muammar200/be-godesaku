<?php

namespace Database\Seeders;

use App\Models\EntryType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EntryType::create([
            "name" => "Lahir",
        ]);
        EntryType::create([
            "name" => "Pindah Masuk",
        ]);
        EntryType::create([
            "name" => "Registrasi Baru",
        ]);
        EntryType::create([
            "name" => "WNA Masuk",
        ]);
    }
}
