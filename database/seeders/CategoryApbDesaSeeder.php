<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryApbDesaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Pendapatan Desa'],
            ['name' => 'Belanja Desa'],
            ['name' => 'Pembiayaan Desa'],
        ];

        DB::table('category_apb_desa')->insert($categories);
    }
}
