<?php

namespace App\Http\Controllers\API\Public;

use App\Models\Slider;
use App\Models\Contact;
use App\Models\SocialMedia;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\SliderResource;
use App\Http\Resources\Public\ContactResource;
use App\Http\Resources\Public\SocialMediaResource;
use App\Models\GeneralInformation;

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
        $profile_summary = GeneralInformation::pluck('profile_summary');

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Profil Singkat Desa',
            'data' => $profile_summary,
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
}
