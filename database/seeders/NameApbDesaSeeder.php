<?php

namespace Database\Seeders;

use App\Models\NameApbDesa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NameApbDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        NameApbDesa::create([
            'category_apb_desa_id' => 1,
            'name' => 'Pendapatan asli desa (PADes)',            
        ]);
        NameApbDesa::create([
            'category_apb_desa_id' => 1,
            'name' => 'Pendapatan transfer',            
        ]);
        NameApbDesa::create([
            'category_apb_desa_id' => 1,
            'name' => 'Pendapatan lainnya',            
        ]);

        NameApbDesa::create([
            'category_apb_desa_id' => 2,
            'name' => 'Bidang Penyelenggaraan Pemerintahan Desa',            
        ]);
        NameApbDesa::create([
            'category_apb_desa_id' => 2,
            'name' => 'Bidang Pembangunan Desa',            
        ]);
        NameApbDesa::create([
            'category_apb_desa_id' => 2,
            'name' => 'Bidang Pembinaan Kemasyarakatan',            
        ]);
        NameApbDesa::create([
            'category_apb_desa_id' => 2,
            'name' => 'Bidang Pemberdayaan Masyarakat',            
        ]);
        NameApbDesa::create([
            'category_apb_desa_id' => 2,
            'name' => 'Bidang Penanggulangan Bencana, Keadaan Darurat, dan Mendesak Desa',            
        ]);

        NameApbDesa::create([
            'category_apb_desa_id' => 3,
            'name' => 'Penerimaan Pembiayaan',
        ]);
        NameApbDesa::create([
            'category_apb_desa_id' => 3,
            'name' => 'Pengeluaran Pembiayaan',
        ]);
    }
}
