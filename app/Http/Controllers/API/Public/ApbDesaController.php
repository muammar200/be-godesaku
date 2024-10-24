<?php

namespace App\Http\Controllers\API\Public;

use App\Models\NameApbDesa;
use Illuminate\Http\Request;
use App\Models\DetailApbDesa;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\OutlayDesaResource;
use App\Http\Resources\Public\ExpenseDesaResource;
use App\Http\Resources\Public\RevenueDesaResource;
use App\Http\Resources\Public\DetailRevenueDesaResource;

class ApbDesaController extends Controller
{
    public function getLastFiveYears()
    {
        $currentYear = date('Y');
        $years = [];

        for ($i = 0; $i < 5; $i++) {
            $years[] = $currentYear - $i;
        }

        $data = [
            'status' => true,
            'message' => 'Menampilkan Data 5 Tahun Terakhir',
            'data' => $years,
        ];

        return response()->json($data, 200);
    }

    public function index(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $totalRevenues = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pendapatan Desa');
        })->where('year', $currentYear)->sum('amount');

        $totalExpenses = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Belanja Desa');
        })->where('year', $currentYear)->sum('amount');

        $totalOutlay = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pembiayaan Desa');
        })->where('year', $currentYear)->sum('amount');

        $data = [
            'status' => true,
            'message' => 'Menampilkan APB Desa Tahun ' . $currentYear,
            'data' => [
                'Pendapatan Desa' => 'Rp ' . $this->formatAmount($totalRevenues),
                'Belanja Desa' => 'Rp ' . $this->formatAmount($totalExpenses),
                'Pembiayaan Desa' => 'Rp ' . $this->formatAmount($totalOutlay),
            ],
        ];

        // $data = [
        //     'status' => true,
        //     'message' => 'Menampilkan Informasi Desa',
        //     'data' => [
        //         ['id' => 1, 'image' => url('storage/images/apb/pendapatan.png'), 'title' => 'Pendapatan Desa', 'total' => 'Rp ' . $this->formatAmount($totalRevenues)],
        //         ['id' => 2, 'image' => url('storage/images/apb/belanja.png'), 'title' => 'Belanja Desa', 'total' => 'Rp ' . $this->formatAmount($totalExpenses)],
        //         ['id' => 3, 'image' => url('storage/images/bansos/pembiayaan.png'), 'title' => 'Pembiyaan Desa', 'total' => $totalOutlay],
        //     ]
        // ];

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

    public function titleExpense(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $title = 'Belanja Desa ' . $currentYear;
        $data = [
            'status' => true,
            'message' => 'Menampilkan Title Belanja Desa',
            'data' => [
                'title' => $title
            ],
        ];

        return response()->json($data, 200);
    }

    public function countExpense(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $revenues = NameApbDesa::where('category_apb_desa_id', 2)->leftJoin('details_apb_desa', function ($join) use ($currentYear) {
            $join->on('name_apb_desa.id', '=', 'details_apb_desa.name_apb_desa_id')
                ->where('details_apb_desa.year', '=', $currentYear);
        })
            ->select('name_apb_desa.id', 'name_apb_desa.name', DB::raw('IFNULL(SUM(details_apb_desa.amount), 0) as total_amount'))
            ->groupBy('name_apb_desa.id', 'name_apb_desa.name')
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Belanja Desa Tahun ' . $currentYear,
            'data' => ExpenseDesaResource::collection($revenues),
        ];

        return response()->json($data, 200);
    }

    public function getExpense(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $revenues = NameApbDesa::with(['detailApbDesa' => function ($query) use ($currentYear) {
            $query->where('year', $currentYear);
        }])
            ->where('category_apb_desa_id', 2)
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Detail Belanja Desa Tahun ' . $currentYear,
            'data' => DetailRevenueDesaResource::collection($revenues),
        ];

        return response()->json($data, 200);
    }

    public function titleOutlay(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $title = 'Pembiayaan Desa ' . $currentYear;
        $data = [
            'status' => true,
            'message' => 'Menampilkan Title Pembiayaan Desa',
            'data' => [
                'title' => $title
            ],
        ];

        return response()->json($data, 200);
    }

    public function countOutlay(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $revenues = NameApbDesa::where('category_apb_desa_id', 3)->leftJoin('details_apb_desa', function ($join) use ($currentYear) {
            $join->on('name_apb_desa.id', '=', 'details_apb_desa.name_apb_desa_id')
                ->where('details_apb_desa.year', '=', $currentYear);
        })
            ->select('name_apb_desa.id', 'name_apb_desa.name', DB::raw('IFNULL(SUM(details_apb_desa.amount), 0) as total_amount'))
            ->groupBy('name_apb_desa.id', 'name_apb_desa.name')
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Pembiayaan Desa Tahun ' . $currentYear,
            'data' => OutlayDesaResource::collection($revenues),
        ];

        return response()->json($data, 200);
    }

    public function getOutlay(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $revenues = NameApbDesa::with(['detailApbDesa' => function ($query) use ($currentYear) {
            $query->where('year', $currentYear);
        }])
            ->where('category_apb_desa_id', 3)
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Detail Pembiayaan Desa Tahun ' . $currentYear,
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
