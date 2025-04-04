<?php

namespace Database\Seeders;

use App\Models\Profession; // Pastikan Anda memiliki model Profession
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProfessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $professions = [
            "Belum / Tidak Bekerja",
            "Mengurus Rumah Tangga",
            "Pelajar / Mahasiswa",
            "Pensiunan",
            "Pegawai Negeri Sipil",
            "Tentara Nasional Indonesia",
            "Kepolisian RI",
            "Perdagangan",
            "Petani / Pekebun",
            "Peternak",
            "Nelayan / Perikanan",
            "Industri",
            "Konstruksi",
            "Transportasi",
            "Karyawan Swasta",
            "Karyawan BUMN",
            "Karyawan BUMD",
            "Karyawan Honorer",
            "Buruh Harian Lepas",
            "Buruh Tani / Perkebunan",
            "Buruh Nelayan / Perikanan",
            "Buruh Peternakan",
            "Pembantu Rumah Tangga",
            "Tukang Cukur",
            "Tukang Listrik",
            "Tukang Batu",
            "Tukang Kayu",
            "Tukang Sol Sepatu",
            "Tukang Las / Pandai Besi",
            "Tukang Jahit",
            "Penata Rambut",
            "Penata Rias",
            "Penata Busana",
            "Mekanik",
            "Tukang Gigi",
            "Seniman",
            "Tabib",
            "Paraji",
            "Perancang Busana",
            "Penerjemah",
            "Imam Masjid",
            "Pendeta",
            "Pastur",
            "Wartawan",
            "Ustadz / Mubaligh",
            "Juru Masak",
            "Promotor Acara",
            "Anggota DPR-RI",
            "Anggota DPD",
            "Anggota BPK",
            "Presiden",
            "Wakil Presiden",
            "Anggota Mahkamah Konstitusi",
            "Anggota Kabinet / Kementerian",
            "Duta Besar",
            "Gubernur",
            "Wakil Gubernur",
            "Bupati",
            "Wakil Bupati",
            "Walikota",
            "Wakil Walikota",
            "Anggota DPRD Provinsi",
            "Anggota DPRD Kabupaten",
            "Dosen",
            "Guru",
            "Pilot",
            "Pengacara",
            "Notaris",
            "Arsitek",
            "Akuntan",
            "Konsultan",
            "Dokter",
            "Bidan",
            "Perawat",
            "Apoteker",
            "Psikiater / Psikolog",
            "Penyiar Televisi",
            "Penyiar Radio",
            "Pelaut",
            "Peneliti",
            "Sopir",
            "Pialang",
            "Paranormal",
            "Pedagang",
            "Perangkat Desa",
            "Kepala Desa",
            "Biarawati",
            "Wiraswasta",
            "Anggota Lembaga Tinggi",
            "Artis",
            "Atlet",
            "Chef",
            "Manajer",
            "Tenaga Tata Usaha",
            "Operator",
            "Pekerja Pengolahan, Kerajinan",
            "Teknisi",
            "Asisten Ahli",
            "Lainnya",
        ];

        foreach ($professions as $profession) {
            Profession::create([
                "name" => $profession,
            ]);
        }
    }
}
