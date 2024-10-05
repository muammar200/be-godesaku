<?php

namespace Database\Seeders;

use App\Models\TypeOfBirthCertificate;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeOfBirthCertificateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $items = [
            'Akta Kelahiran Umum',
            'Akta Kelahiran Dispensasi',
            'Akta Kelahiran Pengadilan',
        ];

        foreach ($items as $item) {
            TypeOfBirthCertificate::create([
                "name" => $item,
            ]);
        }
    }
}
