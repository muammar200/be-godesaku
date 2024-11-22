<?php

namespace App\Http\Controllers\API\Public;

use App\Models\IdmInfo;
use App\Models\IdmIndicator;
use Illuminate\Http\Request;
use App\Models\IdmAnnualScore;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\IdmResource;

class IdmController extends Controller
{
    public function getStatusAndScore()
    {
        $query = IdmInfo::where('year', '2023')->first();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Status dan Skor IDM Tahun 2023',
            'data' => [
                ['id' => '1', 'title' => 'Status IDM 2023', 'value' =>  $query->status,'icon' => url('storage/images/idm/status_idm.png'),], 
                ['id' => '2', 'title' => 'SKor IDM 2023', 'value' => $query->total_score,'icon' => url('storage/images/idm/skor_idm.png'),], 
            ]
        ];

        return response()->json($data, 200);
    }

    public function getIdmInfo()
    {
        $query = IdmInfo::where('year', '2023')->first();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Informasi IDM Tahun 2023',
            'data' => [
                ['id' => '1', 'title' => 'Target Status', 'value' =>  $query->target_status, 'icon' => url('storage/images/idm/target_status.png'),],
                ['id' => '2', 'title' => 'Skor Minimal', 'value' => $query->minimum_score, 'icon' => url('storage/images/idm/skor_minimal.png'),],
                ['id' => '3', 'title' => 'Penambahan', 'value' => $query->increment, 'icon' => url('storage/images/idm/penambahan.png'),],
                ['id' => '4', 'title' => 'Skor IKS', 'value' => $this->formatAmount($query->iks_score) , 'icon' => url('storage/images/idm/iks.png'),],
                ['id' => '5', 'title' => 'Skor IKE', 'value' => $this->formatAmount($query->ike_score), 'icon' => url('storage/images/idm/ike.png'),],
                ['id' => '6', 'title' => 'Skor IKL', 'value' => $this->formatAmount($query->ikl_score), 'icon' => url('storage/images/idm/ikl.png'),],
            ]
        ];

        return response()->json($data, 200);
    }

    public function getAnnualStatistics()
    {
        $query = IdmAnnualScore::all();
        $data = [
            'status' => true,
            'message' => 'Menampilkan Statistik IDM Berdasarkan 5 Tahun Terakhir',
            'data' => [
                ['id' => '1', 'year' => $query[4]->year, 'value' => $query[4]->score],
                ['id' => '2', 'year' => $query[3]->year, 'value' => $query[3]->score],
                ['id' => '3', 'year' => $query[2]->year, 'value' => $query[2]->score],
                ['id' => '4', 'year' => $query[1]->year, 'value' => $query[1]->score],
                ['id' => '5', 'year' => $query[0]->year, 'value' => $query[0]->score],
            ]
        ];

        return response()->json($data, 200);
    }    

    public function getScoreIks()
    {
        $score = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q) {
            $q->where('name', 'iks');
        })->sum('score');

        $count = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q) {
            $q->where('name', 'iks');
        })->count();

        $result = $count > 0 ? $score / $count : 0;

        $result = rtrim(rtrim(number_format($result, 4), '0'), '.');

        $data = [
            'status' => true,
            'message' => 'Menampilkan Total Skor IKS Tahun 2023 ',
            'data' => $result,
        ];

        return response()->json($data, 200);
    }

    public function getDataIks()
    {
        $query = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q){
            $q->where('name', 'iks');
        })->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Data IKS Tahun 2023 ',
            'data' => IdmResource::collection($query),
        ];

        return response()->json($data, 200);
    }

    public function getScoreIkl()
    {
        $score = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q) {
            $q->where('name', 'ikl');
        })->sum('score');

        $count = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q) {
            $q->where('name', 'ikl');
        })->count();

        $result = $count > 0 ? $score / $count : 0;

        $result = rtrim(rtrim(number_format($result, 4), '0'), '.');

        $data = [
            'status' => true,
            'message' => 'Menampilkan Total Skor IKL Tahun 2023 ',
            'data' => $result,
        ];

        return response()->json($data, 200);
    }

    public function getDataIkl()
    {
        $query = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q){
            $q->where('name', 'ikl');
        })->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Data IKL Tahun 2023',
            'data' => IdmResource::collection($query),
        ];

        return response()->json($data, 200);
    }

    public function getScoreIke()
    {
        $score = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q) {
            $q->where('name', 'ike');
        })->sum('score');

        $count = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q) {
            $q->where('name', 'ike');
        })->count();

        $result = $count > 0 ? $score / $count : 0;

        $result = rtrim(rtrim(number_format($result, 4), '0'), '.');

        $data = [
            'status' => true,
            'message' => 'Menampilkan Total Skor IKE Tahun 2023 ',
            'data' => $result,
        ];

        return response()->json($data, 200);
    }

    public function getDataIke()
    {
        $query = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q) {
            $q->where('name', 'ike');
        })->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Data IKE Tahun 2023',
            'data' => IdmResource::collection($query),
        ];

        return response()->json($data, 200);
    }

    public function getScoreIklIdmAndStatus()
    {
        $scoreIkl = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q) {
            $q->where('name', 'ikl');
        })->sum('score');

        $countIkl = IdmIndicator::where('year', '2023')->whereHas('idmIndicatorCategory', function ($q) {
            $q->where('name', 'ikl');
        })->count();

        $resultIkl = $countIkl > 0 ? $scoreIkl / $countIkl : 0;
        $resultIkl = number_format($resultIkl, 4);

        $idm = IdmInfo::where('year', '2023')->first();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Skor IKL, IDM, dan Status IDM Tahun 2023',
            'data' => [
                'ikl' => [
                    'title' => 'IKL 2023',
                    'value' => $resultIkl,
                ],
                'idm' => [
                    'title' => 'IDM 2023',
                    'value' => (string) $idm->total_score,
                ],
                'status_idm' => [
                    'title' => 'Status IDM 2023',
                    'value' => $idm->status,
                ],
            ]
        ];

        return response()->json($data, 200);
    }

    private function formatAmount($amount)
    {
        // Convert the amount to a float to ensure it's numeric
        $formattedAmount = (float) $amount;

        // Check if the amount is an integer or has a decimal part
        if (floor($formattedAmount) == $formattedAmount) {
            // If it's a whole number, return as integer
            return (int) $formattedAmount;
        }

        // Otherwise, return as float to retain decimal places
        return $formattedAmount;
    }
    
}
