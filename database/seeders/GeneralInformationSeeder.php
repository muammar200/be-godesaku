<?php

namespace Database\Seeders;

use App\Models\GeneralInformation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralInformationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralInformation::create([
            'village_name' => 'Desa Biringkanaya',
            'subdistrict_name' => 'Biringkanaya',
            'district_name' => 'Maros',
            'province_name' => 'Sulawesi Selatan',
            'latitude_coordinates' => '-5.211674',
            'longitude_coordinates' => '119.505829',
            'profile_summary' => "Desa Biringkanaya adalah sebuah desa yang terletak di wilayah perbukitan di Kabupaten Maros, Provinsi Sulawesi Selatan. Desa ini berada pada ketinggian sekitar 700 meter di atas permukaan laut, dikelilingi oleh hamparan sawah dan hutan pinus yang subur. Letak geografisnya berada di koordinat 7°20' Lintang Selatan dan 110°30' Bujur Timur. Desa Biringkanaya  berbatasan dengan Desa Mekarsari di sebelah utara, Desa Tanjung di sebelah selatan, dan aliran Sungai Mappaodang di sebelah barat.",
            'vision' => 'Mewujudkan Desa Biringkanaya sebagai desa yang mandiri, sejahtera, dan berkelanjutan dengan semangat gotong royong dan kearifan lokal.',
            'mission' => 'Kami akan meningkatkan kesejahteraan masyarakat melalui pemberdayaan ekonomi, pelestarian budaya, serta pembangunan infrastruktur yang berwawasan lingkungan. Dengan tata kelola pemerintahan yang transparan dan partisipatif, kami juga berkomitmen untuk mengembangkan kualitas sumber daya manusia agar lebih unggul dan berdaya saing.',
            'history' => '<p><strong>Desa Biringkanaya</strong> berdiri sekitar abad ke-18 dan awalnya dikenal dengan nama <strong>Sipatuto</strong>. Desa ini didirikan oleh seorang tokoh masyarakat bernama <strong>Arung</strong>, yang berasal dari daerah Bantimurung dan memutuskan untuk menetap di wilayah ini karena tanahnya yang subur dan strategis. Beliau bersama sekelompok kecil pengikutnya mulai membuka lahan, bercocok tanam, dan mendirikan pemukiman yang kemudian berkembang menjadi desa yang kita kenal sekarang.</p>

<p>Pada masa penjajahan Belanda, Desa Biringkanaya menjadi salah satu pusat perlawanan terhadap penjajah. Masyarakat desa, yang sebagian besar adalah petani, ikut berjuang melawan penindasan dengan berbagai cara, termasuk menyembunyikan para pejuang kemerdekaan di hutan sekitar desa. Semangat gotong royong yang kuat di antara warga desa menjadi kekuatan utama dalam bertahan menghadapi masa-masa sulit tersebut.</p>

<p>Setelah kemerdekaan Indonesia, Desa Biringkanaya mulai berkembang pesat. Perkebunan, pertanian, dan perdagangan menjadi sektor utama perekonomian desa. Pada tahun 1932, desa ini diresmikan secara administratif sebagai bagian dari Kabupaten Maros, dengan struktur pemerintahan desa yang lebih terorganisir.</p>

<p>Seiring berjalannya waktu, Desa Biringkanaya terus mengalami perkembangan. Pembangunan infrastruktur, peningkatan layanan pendidikan, dan pengembangan ekonomi berbasis potensi lokal menjadi fokus utama pemerintah desa. Masyarakatnya yang ramah dan kental dengan budaya gotong royong, hingga kini tetap mempertahankan nilai-nilai tradisional sambil terus berinovasi untuk masa depan yang lebih baik.</p>
',
            'village_logo' => 'logo-desa.png',
            'government_structure' => 'struktur-pemerintahan.png',
            'organization_structure' => 'struktur-organisasi.jpeg'
        ]);
    }
}
