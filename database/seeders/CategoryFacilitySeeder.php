<?php

namespace Database\Seeders;

use App\Models\CategoryFacility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoryFacilitySeeder extends Seeder
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

        // CategoryFacility::create([
        //     'name' => 'Masjid',
        //     'icon' => 'masjid.png',
        //     'type_facility_id' => 5,
        // ]);
        // CategoryFacility::create([
        //     'name' => 'Gereja Protestan',
        //     'icon' => 'protestan.png',
        //     'type_facility_id' => 5,
        // ]);
        // CategoryFacility::create([
        //     'name' => 'Gereja Katolik',
        //     'icon' => 'katolik.png',
        //     'type_facility_id' => 5,
        // ]);
        // CategoryFacility::create([
        //     'name' => 'Pura',
        //     'icon' => 'pura.png',
        //     'type_facility_id' => 5,
        // ]);
        // CategoryFacility::create([
        //     'name' => 'Vihara',
        //     'icon' => 'vihara.png',
        //     'type_facility_id' => 5,
        // ]);
        // CategoryFacility::create([
        //     'name' => 'Klenteng',
        //     'icon' => 'klenteng.png',
        //     'type_facility_id' => 5,
        // ]);

        CategoryFacility::create([
            'name' => 'Pantai',
            'icon' => 'pantai.png',
            'type_facility_id' => 10,
        ]);
        CategoryFacility::create([
            'name' => 'Pegunungan',
            'icon' => 'gunung.png',
            'type_facility_id' => 10,
        ]);
        CategoryFacility::create([
            'name' => 'Museum',
            'icon' => 'museum.png',
            'type_facility_id' => 10,
        ]);
        CategoryFacility::create([
            'name' => 'Kuliner',
            'icon' => 'kuliner.png',
            'type_facility_id' => 10,
        ]);
        CategoryFacility::create([
            'name' => 'Wisata Alam',
            'icon' => 'alam.png',
            'type_facility_id' => 10,
        ]);
    }
}
