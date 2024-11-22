<?php

namespace Database\Seeders;

use App\Models\SocialMedia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SocialMediaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SocialMedia::create([
            'username' => 'pemdes.biringkanaya',
            'icon' => 'ig-icon.png',
            'is_active' => true,
        ]);
        SocialMedia::create([
            'username' => 'desa.biringkanaya',
            'icon' => 'x-icon.png',
            'is_active' => true,
        ]);
        SocialMedia::create([
            'username' => 'biringkanaya.desa',
            'icon' => 'yt-icon.png',
            'is_active' => true,
        ]);
        SocialMedia::create([
            'username' => 'pemdes.biringkanaya',
            'icon' => 'ig-icon.png',
            'is_active' => true,
        ]);
        SocialMedia::create([
            'username' => 'desa.biringkanaya',
            'icon' => 'x-icon.png',
            'is_active' => true,
        ]);
        SocialMedia::create([
            'username' => 'biringkanaya.desa',
            'icon' => 'yt-icon.png',
            'is_active' => true,
        ]);
    }
}
