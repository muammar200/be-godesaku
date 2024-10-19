<?php

namespace App\Http\Controllers\API\Public;

use App\Models\NameApbDesa;
use Illuminate\Http\Request;
use App\Models\DetailApbDesa;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\RevenueDesaResource;
use App\Http\Resources\Public\DetailRevenueDesaResource;

class ApbDesaController extends Controller
{
    public function index(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $totalRevenues = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pendapatan Desa');
        })->where('year', $currentYear)->sum('amount');

        $data = [
            'status' => true,
            'message' => 'Menampilkan APB Desa Tahun ' . $currentYear,
            'data' => [
            'Pendapatan Desa' => 'Rp ' . $this->formatAmount($totalRevenues) 
            ],
        ];

        return response()->json($data, 200);
    }

    // public function countRevenue(Request $request)
    // {
    //     $defaultYear = now()->year;
    //     $currentYear = $request->input('year', $defaultYear);

    //     $revenues = DetailApbDesa::with('nameApbDesa')
    //         ->select('name_apb_desa_id', DB::raw('SUM(amount) as total_amount'))
    //         ->where(
    //             'year',
    //             $currentYear
    //         )
    //         ->groupBy('name_apb_desa_id')
    //         ->get();

    //     $data = [
    //         'status' => true,
    //         'message' => 'Menampilkan Pendapatan Desa Tahun ' . $currentYear,
    //         'data' => RevenueDesaResource::collection($revenues),
    //     ];

    //     return response()->json($data, 200);
    // }

    public function countRevenue(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $revenues = NameApbDesa::where('category_apb_desa_id', 1)->leftJoin('details_apb_desa', function ($join) use ($currentYear) {
            $join->on('name_apb_desa.id', '=', 'details_apb_desa.name_apb_desa_id')
                ->where('details_apb_desa.year', '=', $currentYear);
        })
            ->select('name_apb_desa.id', 'name_apb_desa.name', DB::raw('IFNULL(SUM(details_apb_desa.amount), 0) as total_amount'))
            ->groupBy('name_apb_desa.id', 'name_apb_desa.name')
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Pendapatan Desa Tahun ' . $currentYear,
            'data' => RevenueDesaResource::collection($revenues),
        ];

        return response()->json($data, 200);
    }


    public function getRevenue(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $revenues = NameApbDesa::with(['detailApbDesa' => function ($query) use ($currentYear) {
            $query->where('year', $currentYear);
        }])
            ->where('category_apb_desa_id', 1)
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Detail Pendapatan Desa Tahun ' . $currentYear,
            'data' => DetailRevenueDesaResource::collection($revenues),
        ];

        return response()->json($data, 200);
    }

    private function formatAmount($amount)
    {
        // Convert the amount to a string with two decimal places
        $formattedAmount = number_format($amount, 2, ',', '.');

        // Remove the decimal part if it ends with ,00
        if (substr($formattedAmount, -3) == ',00') {
            return number_format($amount, 0, ',', '.');
        }

        return $formattedAmount;
    }
}
