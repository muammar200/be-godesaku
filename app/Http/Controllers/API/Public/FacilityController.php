<?php

namespace App\Http\Controllers\API\Public;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\FacilityResource;
use App\Http\Resources\Public\FacilityTableResource;

class FacilityController extends Controller
{
    public function index()
    {
        $facilitiesCount = Facility::selectRaw('type_facilities.name, type_facilities.icon, COUNT(facilities.id) as jumlah')
            ->rightJoin('type_facilities', 'facilities.type_facility_id', '=', 'type_facilities.id')
            ->whereBetween('type_facilities.id', [1, 8])
            ->groupBy('type_facilities.name', 'type_facilities.icon')
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Sarana dan Prasarana dengan Icon',
            'data' => FacilityResource::collection($facilitiesCount),
        ];

        return response()->json($data, 200);
    }

    public function index2()
    {
        $facilitiesCount = Facility::selectRaw('type_facilities.name, COUNT(facilities.id) as jumlah')
            ->rightJoin('type_facilities', 'facilities.type_facility_id', '=', 'type_facilities.id')
            ->where('type_facilities.name', '!=', 'Wisata')
            ->groupBy('type_facilities.name')
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Semua Sarana dan Prasarana',
            'data' => FacilityTableResource::collection($facilitiesCount),
        ];

        return response()->json($data, 200);
    }
}
