<?php

namespace App\Http\Controllers\API\Public;

use Carbon\Carbon;
use App\Models\Bansos;
use Illuminate\Http\Request;
use App\Models\BansosReceiver;
use App\Models\MasterPopulation;
use App\Http\Controllers\Controller;
use App\Http\Resources\Public\BansosResource;

class BansosController extends Controller
{
    public function index()
    {
        $bansosData = Bansos::withCount('bansosReceivers')->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Bansos Penduduk',
            'data' => BansosResource::collection($bansosData),
        ];

        return response()->json($data, 200);
    }

    // public function getBansosByNik($nik)
    // {
    //     $penduduk = MasterPopulation::where('nik', $nik)
    //         ->with('bansosReceivers.bansos')
    //         ->first();

    //     if (!$penduduk) {
    //         return response()->json(['message' => 'Penduduk tidak ditemukan'], 404);
    //     }

    //     $bansos = $penduduk->bansosReceivers->pluck('bansos.name');

    //     return response()->json([
    //         'penduduk' => $penduduk->full_name,
    //         'bansos' => $bansos
    //     ]);
    // }

    public function getBansosByNik($nik)
    {
        // Cari penduduk berdasarkan NIK
        $penduduk = MasterPopulation::where('nik', $nik)->first();

        if (!$penduduk) {
            return response()->json(['message' => 'Penduduk tidak ditemukan'], 404);
        }

        // Ambil bantuan sosial yang diterima oleh penduduk tersebut
        $bansos = BansosReceiver::where('master_population_id', $penduduk->id)
            ->with('bansos')  // Mengambil relasi ke Bansos
            ->get();

        // Format respons
        $result = [
            'nama' => $penduduk->full_name,
            'nik' => $penduduk->nik,
            'bansos' => $bansos->map(function ($item, $index) use ($penduduk) {
                return [
                    'id' => $index + 1,
                    'nama' => $penduduk->full_name,
                    'nik' => $penduduk->nik,
                    'nama_bansos' => $item->bansos->name,
                    'deskripsi_bansos' => $item->bansos->description,
                    'periode' => Carbon::parse($item->period)->translatedFormat('d F Y'),
                ];
            }),
        ];

        return response()->json($result);
    }

}
