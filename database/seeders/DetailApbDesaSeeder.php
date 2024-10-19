<?php

namespace Database\Seeders;

use App\Models\DetailApbDesa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DetailApbDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // DetailApbDesa::create([
        //     'name_apb_desa_id' => 1,
        //     'name' => 'Hasil usaha desa',
        //     'amount' => 1000000000,
        //     'year' => 2024
        // ]);
        // DetailApbDesa::create([
        //     'name_apb_desa_id' => 1,
        //     'name' => 'Hasil aset desa',
        //     'amount' => 1000000000,
        //     'year' => 2024
        // ]);
        // DetailApbDesa::create([
        //     'name_apb_desa_id' => 1,
        //     'name' => 'Hasil swadaya dan partisipasi',
        //     'amount' => 1000000000,
        //     'year' => 2024
        // ]);
        // DetailApbDesa::create([
        //     'name_apb_desa_id' => 1,
        //     'name' => 'Hasil retribusi desa',
        //     'amount' => 1000000000,
        //     'year' => 2024
        // ]);

        DetailApbDesa::create([
            'name_apb_desa_id' => 2,
            'name' => 'Dana desa',
            'amount' => 3000000000,
            'year' => 2024
        ]);
        DetailApbDesa::create([
            'name_apb_desa_id' => 2,
            'name' => 'Alokasi Dana Desa (ADD)',
            'amount' => 1000000000,
            'year' => 2024
        ]);
        DetailApbDesa::create([
            'name_apb_desa_id' => 2,
            'name' => 'Hasil pajak dan retribusi daerah',
            'amount' => 1000000000,
            'year' => 2024
        ]);

        DetailApbDesa::create([
            'name_apb_desa_id' => 3,
            'name' => 'Hibah',
            'amount' => 5000000000,
            'year' => 2024
        ]);
        DetailApbDesa::create([
            'name_apb_desa_id' => 3,
            'name' => 'Sumbangan pihak ketiga',
            'amount' => 5000000000,
            'year' => 2024
        ]);
        DetailApbDesa::create([
            'name_apb_desa_id' => 3,
            'name' => 'Sumbangan pihak ketiga',
            'amount' => 10000000000,
            'year' => 2023
        ]);
    }
}
