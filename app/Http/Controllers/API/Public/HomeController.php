<?php

namespace App\Http\Controllers\API\Public;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\SliderResource;

class HomeController extends Controller
{
    public function slider()
    {
        $sliders = Slider::where('is_active', 1)->latest()->get();
        $data = [
            'status' => true,
            'message' => 'Menampilkan Slider',
            'data' => SliderResource::collection($sliders),
        ];

        return response()->json($data, 200); 
    }
}
