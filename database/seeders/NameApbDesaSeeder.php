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
    }
}
