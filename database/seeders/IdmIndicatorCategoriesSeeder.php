<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class IdmIndicatorCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('idm_indicator_categories')->insert([
            ['name' => 'iks'],
            ['name' => 'ike'],
            ['name' => 'ikl'],
        ]);
    }
}
