<?php

namespace App\Http\Controllers\API\Public;

use App\Models\Slider;
use App\Models\Contact;
use App\Models\IdmInfo;
use App\Models\Facility;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Models\DetailApbDesa;
use App\Models\BansosReceiver;
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
        $bansos_count = BansosReceiver::count();

        // APB
        $year = now()->year;
        $totalRevenues = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pendapatan Desa');
        })->where('year', $year)->sum('amount');

        $totalExpenses = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Belanja Desa');
        })->where('year', $year)->sum('amount');

        $totalOutlay = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pembiayaan Desa');
        })->where('year', $year)->sum('amount');

        $apb = $totalRevenues + $totalExpenses + $totalOutlay;
        $formattedApb = $this->formatNominal($apb);


        $data = [
            'status' => true,
            'message' => 'Menampilkan Informasi Desa',
            'data' => [
                ['id' => 1, 'image' => url('storage/images/populations/jumlah-penduduk.png'), 'title' => 'Jumlah Penduduk', 'total' => $count_population . ' Jiwa'],
                ['id' => 2, 'image' => url('storage/images/bansos/bantuan.png'), 'title' => 'Bantuan Sosial', 'total' => $bansos_count],
                ['id' => 3, 'image' => url('storage/images/facilities/sarana.png'), 'title' => 'Sarana dan Prasarana', 'total' => $facilities_count],
                ['id' => 4, 'image' => url('storage/images/apb/apb.png'), 'title' => 'APB Desa', 'total' => $formattedApb],
                ['id' => 5, 'image' => url('storage/images/facilities/rumah-ibadah.png'), 'title' => 'Rumah Ibadah', 'total' => $count_place_worship],
                ['id' => 6, 'image' => url('storage/images/facilities/wisata.png'), 'title' => 'Wisata', 'total' => $tourist_destination],
            ]
        ];

        return response()->json($data, 200);
    }

    public function showVillageInformationAndIdm()
    {
        $count_population = MasterPopulation::count();
        $count_place_worship = Facility::where('type_facility_id', 5)->count();
        $tourist_destination = Facility::where('type_facility_id', 10)->count();
        $facilities_count = Facility::where('type_facility_id', '!=', 5)->where('type_facility_id', '!=', 10)->count();
        $bansos_count = BansosReceiver::count();
        $idm = IdmInfo::where('year', '2023')->first();

        // APB
        $year = now()->year;
        $totalRevenues = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pendapatan Desa');
        })->where('year', $year)->sum('amount');

        $totalExpenses = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Belanja Desa');
        })->where('year', $year)->sum('amount');

        $totalOutlay = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pembiayaan Desa');
        })->where('year', $year)->sum('amount');

        $apb = $totalRevenues + $totalExpenses + $totalOutlay;
        $formattedApb = $this->formatNominal($apb);


        $data = [
            'status' => true,
            'message' => 'Menampilkan Informasi Desa',
            'data' => [
                ['id' => 1, 'image' => url('storage/images/populations/jumlah-penduduk.png'), 'title' => 'Jumlah Penduduk', 'total' => $count_population . ' Jiwa'],
                ['id' => 2, 'image' => url('storage/images/bansos/bantuan.png'), 'title' => 'Bantuan Sosial', 'total' => $bansos_count],
                ['id' => 3, 'image' => url('storage/images/facilities/sarana.png'), 'title' => 'Sarana dan Prasarana', 'total' => $facilities_count],
                ['id' => 4, 'image' => url('storage/images/apb/apb.png'), 'title' => 'APB Desa', 'total' => $formattedApb],
                ['id' => 5, 'image' => url('storage/images/facilities/rumah-ibadah.png'), 'title' => 'Rumah Ibadah', 'total' => $count_place_worship],
                ['id' => 6, 'image' => url('storage/images/facilities/wisata.png'), 'title' => 'Wisata', 'total' => $tourist_destination],
                ['id' => 7, 'image' => url('storage/images/idm/desa 3.png'), 'title' => 'IDM', 'total' => $idm->status],
            ]
        ];

        return response()->json($data, 200);
    }

    private function formatNominal($number)
    {
        if ($number >= 1000000000000) {
            $formattedNumber = $number / 1000000000000;
            return $this->removeTrailingZeros($formattedNumber) . ' Triliun';
        } elseif ($number >= 1000000000) {
            $formattedNumber = $number / 1000000000;
            return $this->removeTrailingZeros($formattedNumber) . ' Miliar';
        } elseif ($number >= 1000000) {
            $formattedNumber = $number / 1000000;
            return $this->removeTrailingZeros($formattedNumber) . ' Juta';
        } elseif ($number >= 1000) {
            $formattedNumber = $number / 1000;
            return $this->removeTrailingZeros($formattedNumber) . ' Ribu';
        }

        return number_format($number, 0);
    }

    private function removeTrailingZeros($number)
    {
        return strpos($number, '.') !== false ? rtrim(rtrim(number_format($number, 1), '0'), '.') : $number;
    }
}
