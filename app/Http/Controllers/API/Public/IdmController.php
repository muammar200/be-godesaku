<?php

namespace App\Http\Controllers\API\Public;

use App\Models\IdmInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\IdmAnnualScore;

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
