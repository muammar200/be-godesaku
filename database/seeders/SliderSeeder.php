<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('sliders')->insert([
            [
                'title' => 'Selamat Datang di Website Resmi Desa Biringkanaya',
                'description' => 'Pusat informasi terpercaya yang dikelola oleh pemerintah',
                'image' => 'slider-image1.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Slider 2',
                'description' => 'This is the description for slider 2.',
                'image' => 'slider-image2.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Slider 3',
                'description' => 'This is the description for slider 3.',
                'image' => 'slider-image3.jpg',
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
