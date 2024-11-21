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
                ['id' => 1, 'title' => 'Pendapatan Desa', 'total' => $this->formatAmount($totalRevenues), 'icon' => url('storage/images/apb/pendapatan.png'),],
                ['id' => 2, 'title' => 'Belanja Desa', 'total' => $this->formatAmount($totalExpenses), 'icon' => url('storage/images/apb/belanja.png'),],
                ['id' => 3, 'title' => 'Pembiayaan Desa', 'total' => $this->formatAmount($totalOutlay), 'icon' => url('storage/images/apb/pembiayaan.png'),],
            ],
        ];

        return response()->json($data, 200);
    }

    public function titleRevenueAndExpense(Request $request)
    {
        // Tahun default adalah rentang 5 tahun terakhir
        $defaultStartYear = now()->year - 4;
        $defaultEndYear = now()->year;
        $defaultRange = "$defaultStartYear-$defaultEndYear";

        // Ambil input user jika ada
        $inputRange = $request->input('year', $defaultRange);

        // Validasi format input
        if (preg_match('/^\d{4}-\d{4}$/', $inputRange)) {
            [$startYear, $endYear] = explode('-', $inputRange);

            // Pastikan tahun awal <= tahun akhir
            if ($startYear > $endYear) {
                return response()->json([
                    'status' => false,
                    'message' => 'Tahun awal tidak boleh lebih besar dari tahun akhir.',
                    'data' => []
                ], 400);
            }

            $currentYear = "$startYear-$endYear";
        } else {
            // Gunakan rentang default jika format salah
            $currentYear = $defaultRange;
        }

        // Title berdasarkan rentang tahun
        $title = 'Pendapatan dan Belanja Desa ' . $currentYear;

        $data = [
            'status' => true,
            'message' => 'Menampilkan Title Pendapatan Desa',
            'data' => [
                'title' => $title
            ],
        ];

        return response()->json($data, 200);
    }

    public function countRevenueandExpense()
    {
        $currentYear = now()->year;
        $lastFiveYears = range($currentYear - 4, $currentYear);

        $yearCategories = [
            ['id' => 1, 'year' => $lastFiveYears[0]],
            ['id' => 2, 'year' => $lastFiveYears[1]],
            ['id' => 3, 'year' => $lastFiveYears[2]],
            ['id' => 4, 'year' => $lastFiveYears[3]],
            ['id' => 5, 'year' => $lastFiveYears[4]],
        ];

        $totalRevenues2020 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pendapatan Desa');
        })->where('year', '2020')->sum('amount');
        $totalRevenues2021 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pendapatan Desa');
        })->where('year', '2021')->sum('amount');
        $totalRevenues2022 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pendapatan Desa');
        })->where('year', '2022')->sum('amount');
        $totalRevenues2023 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pendapatan Desa');
        })->where('year', '2023')->sum('amount');
        $totalRevenues2024 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Pendapatan Desa');
        })->where('year', '2024')->sum('amount');

        $totalExpense2020 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Belanja Desa');
        })->where('year', '2020')->sum('amount');
        $totalExpense2021 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Belanja Desa');
        })->where('year', '2021')->sum('amount');
        $totalExpense2022 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Belanja Desa');
        })->where('year', '2022')->sum('amount');
        $totalExpense2023 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Belanja Desa');
        })->where('year', '2023')->sum('amount');
        $totalExpense2024 = DetailApbDesa::whereHas('nameApbDesa.categoryApbDesa', function ($query) {
            $query->where('name', 'Belanja Desa');
        })->where('year', '2024')->sum('amount');

        $count = [
            ['id' => 1, 'title' => 'Pendapatan', 'total' => [$this->formatAmountRevenue($totalRevenues2020), $this->formatAmountRevenue($totalRevenues2021), $this->formatAmountRevenue($totalRevenues2022), $this->formatAmountRevenue($totalRevenues2023), $this->formatAmountRevenue($totalRevenues2024)]],
            ['id' => 2, 'title' => 'Belanja', 'total' => [$this->formatAmountRevenue($totalExpense2020), $this->formatAmountRevenue($totalExpense2021), $this->formatAmountRevenue($totalExpense2022), $this->formatAmountRevenue($totalExpense2023), $this->formatAmountRevenue($totalExpense2024)]],
        ];

        $data = [
            'status' => true,
            'message' => 'Menampilkan Pendapatan dan Belanja Desa 5 Tahun Terakhir',
            'category' => $yearCategories,
            'data' => $count
        ];

        return response()->json($data, 200);

        
        
        
    }


    public function titleRevenue(Request $request)
    {
        $defaultYear = now()->year;
        $currentYear = $request->input('year', $defaultYear);

        $title = 'Pendapatan Desa ' . $currentYear;
        $data = [
            'status' => true,
            'message' => 'Menampilkan Title Pendapatan Desa',
            'data' => [
                'title' => $title
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

    private function formatAmountRevenue($amount)
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
