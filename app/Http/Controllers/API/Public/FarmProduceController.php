<?php

namespace App\Http\Controllers\API\Public;

use App\Models\FarmProduce;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\FarmProduceResource;

class FarmProduceController extends Controller
{
    public function highestProductionLevel()
    {
        $highestProductions = DB::table('farm_produces')
            ->join('production_levels', 'farm_produces.production_level_id', '=', 'production_levels.id')
            ->orderBy('production_levels.level', 'asc') 
            ->orderBy('farm_produces.quantity', 'desc') 
            ->limit(9)->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Hasil Tani Tertinggi',
            'data' => FarmProduceResource::collection($highestProductions),
        ];

        return response()->json($data);
    }

    public function otherProductionLevels()
    {
        $otherProductions = DB::table('farm_produces')
            ->join('production_levels', 'farm_produces.production_level_id', '=', 'production_levels.id')
            ->orderBy('production_levels.level', 'asc')
            ->orderBy('farm_produces.quantity', 'desc')
            ->offset(9) 
            ->limit(1000) 
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Hasil Tani Lainnya',
            'data' => FarmProduceResource::collection($otherProductions),
        ];

        return response()->json($data);
    }

    



}
