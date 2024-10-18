<?php

namespace App\Http\Controllers\API\Public;

use App\Models\Facility;
use Illuminate\Http\Request;
use App\Models\CategoryFacility;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\FacilityResource;
use App\Http\Resources\Public\FacilityTableResource;
use App\Http\Resources\Public\FacilityWorshipResource;

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

    public function countWorshipFacility()
    {
        $totals = Facility::selectRaw('category_facilities.name, category_facilities.icon, COUNT(facilities.id) as jumlah')
        ->rightJoin('category_facilities', 'facilities.category_facility_id', '=', 'category_facilities.id')
            ->whereBetween('category_facilities.id', [1, 6])
        ->groupBy('category_facilities.name', 'category_facilities.icon')
        ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Jumlah Tempat Ibadah dengan Icon',
            'data' => FacilityResource::collection($totals),
        ];

        return response()->json($data, 200);
    }

    public function getWorshipFacility()
    {
        $masjid = Facility::where('category_facility_id', 1)->select('facilities.name', 'facilities.location')->get();
        $protestan = Facility::where('category_facility_id', 2)->select('facilities.name', 'facilities.location')->get();
        $katolik = Facility::where('category_facility_id', 3)->select('facilities.name', 'facilities.location')->get();
        $pura = Facility::where('category_facility_id', 4)->select('facilities.name', 'facilities.location')->get();
        $vihara = Facility::where('category_facility_id', 5)->select('facilities.name', 'facilities.location')->get();
        $klenteng = Facility::where('category_facility_id', 6)->select('facilities.name', 'facilities.location')->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Semua Tempat Ibadah',
            'data' => [
                'Masjid' => FacilityWorshipResource::collection($masjid),
                'Gereja Protestan' => FacilityWorshipResource::collection($protestan),
                'Gereja Katolik' => FacilityWorshipResource::collection($katolik),
                'Pura' => FacilityWorshipResource::collection($pura),
                'Vihara' => FacilityWorshipResource::collection($vihara),
                'Klenteng' => FacilityWorshipResource::collection($klenteng),
            ]
        ];

        return response()->json($data, 200);
    }
}
