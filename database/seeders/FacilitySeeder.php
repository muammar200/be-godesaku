<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FacilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $facilities = [
        //     ['name' => 'Toyota Avanza', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Honda Civic', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Suzuki Ertiga', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Mitsubishi Xpander', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Nissan Grand Livina', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Daihatsu Xenia', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Isuzu Panther', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'BMW X5', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Mercedes-Benz E-Class', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Ford Ranger', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Chevrolet Spin', 'type_facility_id' => 1, 'category_facility_id' => null],
        //     ['name' => 'Toyota Fortuner', 'type_facility_id' => 1, 'category_facility_id' => null],
        // ];

        // DB::table('facilities')->insert($facilities);

        // $facilities = [
        //     ['name' => 'Sekolah Dasar Negeri 1', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Sekolah Menengah Pertama Negeri 2', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Sekolah Menengah Atas Negeri 3', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Universitas Gajah Mada', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Institut Teknologi Bandung', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Perpustakaan Nasional', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Politeknik Negeri Jakarta', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Sekolah Tinggi Ilmu Ekonomi', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Madrasah Ibtidaiyah Al Huda', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Madrasah Tsanawiyah Al Ikhlas', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Madrasah Aliyah Negeri', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Akademi Kebidanan Indonesia', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Universitas Indonesia', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Sekolah Menengah Kejuruan 1', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Akademi Pariwisata Nusantara', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Sekolah Tinggi Agama Islam', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Akademi Penerbangan Angkasa', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Sekolah Menengah Pertama Al-Azhar', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Sekolah Menengah Atas Al-Irsyad', 'type_facility_id' => 2, 'category_facility_id' => null],
        //     ['name' => 'Universitas Padjadjaran', 'type_facility_id' => 2, 'category_facility_id' => null],
        // ];

        // DB::table('facilities')->insert($facilities);

        // $facilities = [
        //     ['name' => 'Rumah Sakit Umum Daerah', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Pertamina', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Siloam', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Harapan Bunda', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Puskesmas Kecamatan Tanah Abang', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Klinik Pratama Sehat', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Hermina', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Mitra Keluarga', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Muhammadiyah', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Fatmawati', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Klinik Medika Utama', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Umum Pusat Cipto Mangunkusumo',
        //         'type_facility_id' => 3,
        //         'category_facility_id' => null
        //     ],
        //     ['name' => 'Klinik Gigi Sehat', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Puskesmas Cikini', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Medistra', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Pondok Indah', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Klinik Utama Citra Sehat', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Kanker Dharmais', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Pelni', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Klinik Mata Nusantara', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Jiwa Grogol', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Mata Aini', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Klinik Sejahtera', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Puskesmas Tebet', 'type_facility_id' => 3, 'category_facility_id' => null],
        //     ['name' => 'Rumah Sakit Advent', 'type_facility_id' => 3, 'category_facility_id' => null],
        // ];

        // DB::table('facilities')->insert($facilities);

        // $facilities = [
        //     ['name' => 'Stadion Utama Gelora Bung Karno', 'type_facility_id' => 4, 'category_facility_id' => null],
        //     ['name' => 'Gelanggang Olahraga Senayan', 'type_facility_id' => 4, 'category_facility_id' => null],
        //     ['name' => 'Lapangan Basket Kemayoran', 'type_facility_id' => 4, 'category_facility_id' => null],
        //     ['name' => 'Kolam Renang Cikini', 'type_facility_id' => 4, 'category_facility_id' => null],
        //     ['name' => 'Stadion Madya Jakarta', 'type_facility_id' => 4, 'category_facility_id' => null],
        //     ['name' => 'Lapangan Tenis Rawamangun', 'type_facility_id' => 4, 'category_facility_id' => null],
        //     ['name' => 'Gymnasium Bulungan', 'type_facility_id' => 4, 'category_facility_id' => null],
        // ];
        // DB::table('facilities')->insert($facilities);

        // $facilities = [
        //     ['name' => 'Jembatan Suramadu', 'type_facility_id' => 6, 'category_facility_id' => null],
        //     ['name' => 'Jembatan Ampera', 'type_facility_id' => 6, 'category_facility_id' => null],
        //     ['name' => 'Jembatan Pasupati', 'type_facility_id' => 6, 'category_facility_id' => null],
        //     ['name' => 'Jembatan Youtefa', 'type_facility_id' => 6, 'category_facility_id' => null],
        // ];

        // DB::table('facilities')->insert($facilities);

        // $facilities = [
        //     ['name' => 'PLN Pembangkit Listrik Tenaga Uap', 'type_facility_id' => 7, 'category_facility_id' => null],
        //     ['name' => 'PLN Pembangkit Listrik Tenaga Air', 'type_facility_id' => 7, 'category_facility_id' => null],
        //     ['name' => 'PLN Pembangkit Listrik Tenaga Surya', 'type_facility_id' => 7, 'category_facility_id' => null],
        //     ['name' => 'PLN Pembangkit Listrik Tenaga Geotermal', 'type_facility_id' => 7, 'category_facility_id' => null],
        // ];

        // DB::table('facilities')->insert($facilities);

        // $facilities = [
        //     ['name' => 'Pasar Desa A', 'type_facility_id' => 8, 'category_facility_id' => null],
        //     ['name' => 'Pasar Desa B', 'type_facility_id' => 8, 'category_facility_id' => null],
        //     ['name' => 'Pasar Desa C', 'type_facility_id' => 8, 'category_facility_id' => null],
        //     ['name' => 'Pasar Desa D', 'type_facility_id' => 8, 'category_facility_id' => null],
        //     ['name' => 'Pasar Desa E', 'type_facility_id' => 8, 'category_facility_id' => null],
        //     ['name' => 'Pasar Desa F', 'type_facility_id' => 8, 'category_facility_id' => null],
        //     ['name' => 'Pasar Desa G', 'type_facility_id' => 8, 'category_facility_id' => null],
        // ];

        // DB::table('facilities')->insert($facilities);

        // $facilities = [
        //     ['name' => 'Posyandu Melati', 'type_facility_id' => 9, 'category_facility_id' => null],
        //     ['name' => 'Puskesmas Budi Luhur', 'type_facility_id' => 9, 'category_facility_id' => null],
        //     ['name' => 'Posyandu Harapan Ibu', 'type_facility_id' => 9, 'category_facility_id' => null],
        // ];

        // DB::table('facilities')->insert($facilities);

        // $facilities = [
        //     ['name' => 'Pantai Indah', 'type_facility_id' => 10],
        //     ['name' => 'Air Terjun Cinta', 'type_facility_id' => 10],
        //     ['name' => 'Gunung Merah', 'type_facility_id' => 10],
        //     ['name' => 'Danau Biru', 'type_facility_id' => 10],
        //     ['name' => 'Kebun Binatang Sejahtera', 'type_facility_id' => 10],
        //     ['name' => 'Museum Sejarah', 'type_facility_id' => 10],
        //     ['name' => 'Taman Bunga Nusantara', 'type_facility_id' => 10],
        // ];

        // DB::table('facilities')->insert($facilities);

        // $facilities = [
        //     ['name' => 'Masjid Al-Ikhlas', 'type_facility_id' => 5, 'category_facility_id' => 1, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Masjid Yaqin', 'type_facility_id' => 5, 'category_facility_id' => 1, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Katolik Berkat', 'type_facility_id' => 5, 'category_facility_id' => 2, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Katolik Santo Paulus', 'type_facility_id' => 5, 'category_facility_id' => 2, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Gereja Berkat', 'type_facility_id' => 5, 'category_facility_id' => 3, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Gereja Santo Petrus', 'type_facility_id' => 5, 'category_facility_id' => 3, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Pura Wedha', 'type_facility_id' => 5, 'category_facility_id' => 4, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Pura Bakti', 'type_facility_id' => 5, 'category_facility_id' => 4, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Pura Bakti', 'type_facility_id' => 5, 'category_facility_id' => 4, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Vihara Wedha', 'type_facility_id' => 5, 'category_facility_id' => 5, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Vihara Bakti', 'type_facility_id' => 5, 'category_facility_id' => 5, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Klenteng Wedha', 'type_facility_id' => 5, 'category_facility_id' => 6, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        //     ['name' => 'Klenteng Bakti', 'type_facility_id' => 5, 'category_facility_id' => 6, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        // ];

        // DB::table('facilities')->insert($facilities);

        $facilities = [
            ['name' => 'Pantai Biru', 'type_facility_id' => 10, 'category_facility_id' => 7, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Pantai Galesong', 'type_facility_id' => 10, 'category_facility_id' => 7, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Pantai Marina', 'type_facility_id' => 10, 'category_facility_id' => 7, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Bawakaraeng', 'type_facility_id' => 10, 'category_facility_id' => 8, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Latimojong', 'type_facility_id' => 10, 'category_facility_id' => 8, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Museum Andi Tonro', 'type_facility_id' => 10, 'category_facility_id' => 9, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Museum Roterdam', 'type_facility_id' => 10, 'category_facility_id' => 9, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Kampung Kuliner', 'type_facility_id' => 10, 'category_facility_id' => 10, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Emmy Saeland', 'type_facility_id' => 10, 'category_facility_id' => 10, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Taman Purbakala', 'type_facility_id' => 10, 'category_facility_id' => 11, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
            ['name' => 'Taman Asri', 'type_facility_id' => 10, 'category_facility_id' => 11, 'location' => 'Desa Biringkanaya, Kecamatan Biringkanaya'],
        ];

        DB::table('facilities')->insert($facilities);
    }
}
