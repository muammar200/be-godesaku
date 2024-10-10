<?php

namespace Database\Seeders;

use App\Models\Activity;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('activities')->insert([
            [
                'name' => 'Workshop Laravel',
                'description' => 'Pelatihan Laravel untuk pengembangan aplikasi web.',
                'start_date' => '2024-10-15',
                'end_date' => '2024-10-16',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seminar Teknologi AI',
                'description' => 'Seminar tentang pengenalan teknologi kecerdasan buatan.',
                'start_date' => '2024-11-01',
                'end_date' => '2024-11-02',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Hackathon Nasional',
                'description' => 'Kompetisi coding selama 48 jam untuk membangun solusi inovatif.',
                'start_date' => '2024-12-05',
                'end_date' => '2024-12-07',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
