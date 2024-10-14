<?php

namespace Database\Seeders;

use App\Models\TypeFacility;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TypeFacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // TypeFacility::create([
        //     'name' => 'Kendaraan Dinas',
        //     'icon' => 'kendaraan.png'
        // ]);
        // TypeFacility::create([
        //     'name' => 'Sarana Pendidikan',
        //     'icon' => 'pendidikan.png'
        // ]);
        // TypeFacility::create([
        //     'name' => 'Sarana Kesehatan',
        //     'icon' => 'kesehatan.png'
        // ]);
        // TypeFacility::create([
        //     'name' => 'Sarana Olahraga',
        //     'icon' => 'olahraga.png'
        // ]);
        // TypeFacility::create([
        //     'name' => 'Sarana Ibadah',
        //     'icon' => 'ibadah.png'
        // ]);
        // TypeFacility::create([
        //     'name' => 'Jembatan',
        //     'icon' => 'jembatan.png'
        // ]);
        // TypeFacility::create([
        //     'name' => 'Pembangkit Listrik',
        //     'icon' => 'pembangkit_listrik.png'
        // ]);
        // TypeFacility::create([
        //     'name' => 'Pasar Desa',
        //     'icon' => 'pasar.png'
        // ]);
        // TypeFacility::create([
        //     'name' => 'Posyandu/Puskesmas',
        //     'icon' => 'pasar.png'
        // ]);
        TypeFacility::create([
            'name' => 'Wisata',
            'icon' => 'wisata.png'
        ]);
    }
}
