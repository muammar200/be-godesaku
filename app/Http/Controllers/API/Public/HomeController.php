<?php

namespace App\Http\Controllers\API\Public;

use App\Models\Slider;
use App\Models\Contact;
use App\Models\Facility;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Models\MasterPopulation;
use App\Models\GeneralInformation;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\SliderResource;
use App\Http\Resources\Public\ContactResource;
use App\Http\Resources\Public\SocialMediaResource;

class HomeController extends Controller
{
    public function slider()
    {
        $sliders = Slider::where('is_active', 1)->latest()->get();
        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Slider',
            'data' => SliderResource::collection($sliders),
        ];

        return response()->json($data, 200); 
    }

    public function contact()
    {
        $contacts = Contact::where('is_active', 1)->latest()->get();
        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Kontak Desa',
            'data' => ContactResource::collection($contacts),
        ];

        return response()->json($data, 200); 
    }

    public function socialMedia()
    {
        $contacts = SocialMedia::where('is_active', 1)->latest()->get();
        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Sosial Media Desa',
            'data' => SocialMediaResource::collection($contacts),
        ];

        return response()->json($data, 200); 
    }

    public function profileSummary()
    {
        $profile_summary = GeneralInformation::where('id', 1)->value('profile_summary');

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Profil Singkat Desa',
            'data' => [
                'title' => 'Profil singkat ' . GeneralInformation::where('id', 1)->value('village_name'),
                'deskripsi' => $profile_summary
            ],
        ];

        return response()->json($data, 200); 
    }

    public function showGeneralInformation()
    {
        $village_name = GeneralInformation::where('id', 1)->value('village_name');
        $subdistrict_name = GeneralInformation::where('id', 1)->value('subdistrict_name');
        $district_name = GeneralInformation::where('id', 1)->value('district_name');
        $province_name = GeneralInformation::where('id', 1)->value('province_name');
        $village_logo = GeneralInformation::where('id', 1)->value('village_logo');

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Informasi Desa',
            'data' => [
                'nama' => $village_name,
                'kecamatan' => $subdistrict_name,
                'kabupaten' => $district_name,
                'provinsi' => $province_name,
                'logo' => url('storage/images/generals/' . $village_logo),
            ],
        ];

        return response()->json($data, 200);
    }

    public function showLocation()
    {
        $latitude = GeneralInformation::where('id', 1)->value('latitude_coordinates');
        $longitude = GeneralInformation::where('id', 1)->value('longitude_coordinates');

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Titik Lokasi Desa',
            'data' => [
                'latitude' => $latitude,
                'longitude' => $longitude,
            ],
        ];

        return response()->json($data, 200);
    }

    public function showGovernmentStructure()
    {
        $government_structure = GeneralInformation::where('id', 1)->value('government_structure');

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Url Gambar Struktur Pemerintahan Desa',
            'data' => [
                'image' => url('storage/images/generals/' . $government_structure),
            ],
        ];

        return response()->json($data, 200);
    }

    public function showOrganizationStructure()
    {
        $organization_structure = GeneralInformation::where('id', 1)->value('organization_structure');

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Url Gambar Struktur Organisasi Desa',
            'data' => [
                'image' => url('storage/images/generals/' . $organization_structure),
            ],
        ];

        return response()->json($data, 200);
    }

    public function showVisionMission()
    {
        $vision = GeneralInformation::where('id', 1)->value('vision');
        $mission = GeneralInformation::where('id', 1)->value('mission');

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Visi dan Misi Desa',
            'data' => [
                'visi' => $vision,
                'misi' => $mission,
            ],
        ];

        return response()->json($data, 200);
    }

    public function showHistory()
    {
        $history = GeneralInformation::where('id', 1)->value('history');

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Sejarah Desa',
            'data' => [
                'deskripsi 1' => '<p>Desa Biringkanaya berdiri sekitar abad ke-18 dan awalnya dikenal dengan nama Sipatuo. Desa ini didirikan oleh seorang tokoh masyarakat bernama Arung, yang berasal dari daerah Bantimurung dan memutuskan untuk menetap di wilayah ini karena tanahnya yang subur dan strategis. Beliau bersama sekelompok kecil pengikutnya mulai membuka lahan, bercocok tanam, dan mendirikan pemukiman yang kemudian berkembang menjadi desa yang kita kenal sekarang.</p><p><br></p><p>Pada masa penjajahan Belanda, Desa Biringkanaya  menjadi salah satu pusat perlawanan terhadap penjajah. Masyarakat desa, yang sebagian besar adalah petani, ikut berjuang melawan penindasan dengan berbagai cara, termasuk menyembunyikan para pejuang kemerdekaan di hutan sekitar desa. Semangat gotong royong yang kuat di antara warga desa menjadi kekuatan utama dalam bertahan menghadapi masa-masa sulit tersebut.</p>',
                'deskripsi 2' => '<p><br></p><p>Setelah kemerdekaan Indonesia, Desa Biringkanaya mulai berkembang pesat. Perkebunan, pertanian, dan perdagangan menjadi sektor utama perekonomian desa. Pada tahun 1932, desa ini diresmikan secara administratif sebagai bagian dari Kabupaten Maros, dengan struktur pemerintahan desa yang lebih terorganisir.</p><p><br></p><p>Seiring berjalannya waktu, Desa Biringkanaya terus mengalami perkembangan. Pembangunan infrastruktur, peningkatan layanan pendidikan, dan pengembangan ekonomi berbasis potensi lokal menjadi fokus utama pemerintah desa. Masyarakatnya yang ramah dan kental dengan budaya gotong royong, hingga kini tetap mempertahankan nilai-nilai tradisional sambil terus berinovasi untuk masa depan yang lebih baik.</p>',
            ]
        ];

        return response()->json($data, 200);
    }

    public function showAreaDesc()
    {
        $area_desc = GeneralInformation::where('id', 1)->value('area_map');

        $latitude = GeneralInformation::where('id', 1)->value('latitude_coordinates');
        $longitude = GeneralInformation::where('id', 1)->value('longitude_coordinates');

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Deskripsi Peta Wilayah dan Titik Lokasi Desa',
            'data' => [
                'deskripsi' => $area_desc,
                'latitude' => $latitude,
                'longitude' => $longitude,
            ]
        ];

        return response()->json($data, 200);   
    }

    public function showVillageInformation()
    {
        $count_population = MasterPopulation::count();
        $count_place_worship = Facility::where('type_facility_id', 5)->count();
        $tourist_destination = Facility::where('type_facility_id', 10)->count();
        $facilities_count = Facility::where('type_facility_id', '!=', 5)->where('type_facility_id', '!=', 10)->count();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Informasi Desa',
            'data' => [
                'Jumlah Penduduk' => $count_population,
                'Sarana dan Prasarana' => $facilities_count,
                'Rumah Ibadah' => $count_place_worship,
                'Wisata' => $tourist_destination,
            ],
        ];

        return response()->json($data, 200);
    }
}
