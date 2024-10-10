<?php

namespace App\Http\Controllers\API\Public;

use App\Models\Activity;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\ActivityResource;

class ActivityController extends Controller
{
    public function showActivity()
    {
        $activities = Activity::latest()->get();

        $data = [
            'status' => true,
            'message' => 'Berhasil Menampilkan Kegiatan Desa',
            'data' => ActivityResource::collection($activities),
        ];

        return response()->json($data, 200); 
    }
}
