<?php

namespace Database\Seeders;

use App\Models\Bansos;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BansosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bansos::create([
            'name' => 'Program Keluarga Harapan (PKH)',
            'description' => 'lorem',
            'icon' => 'pkh_icon.png',
        ]);
        Bansos::create([
            'name' => 'Bantuan Pangan Non-Tunai (BPNT)',
            'description' => 'lorem',
            'icon' => 'bpnt_icon.png',
        ]);
        Bansos::create([
            'name' => 'Bantuan Sosial Tunai (BST)',
            'description' => 'lorem',
            'icon' => 'bst_icon.png',
        ]);
        Bansos::create([
            'name' => 'Bantuan Langsung Tunai Dana Desa',
            'description' => 'lorem',
            'icon' => 'bltdd_icon.png',
        ]);
        Bansos::create([
            'name' => 'Bantuan Subsisi Upah (BSU)',
            'description' => 'lorem',
            'icon' => 'bsu_icon.png',
        ]);
        Bansos::create([
            'name' => 'Kartu Indonesia Pintar (KIP)',
            'description' => 'lorem',
            'icon' => 'kip_icon.png',
        ]);
        Bansos::create([
            'name' => 'Kartu Indonesia Sehat (KIS)',
            'description' => 'lorem',
            'icon' => 'kis_icon.png',
        ]);
        Bansos::create([
            'name' => 'Program Indonesia Pintar (PIP)',
            'description' => 'lorem',
            'icon' => 'pip_icon.png',
        ]);
    }
}
