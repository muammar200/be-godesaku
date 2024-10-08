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
}
