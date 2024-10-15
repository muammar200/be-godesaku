<?php

namespace App\Http\Controllers\API\Public;

use Carbon\Carbon;
use App\Models\Birth;
use App\Models\Death;
use App\Models\Education;
use App\Models\Profession;
use Illuminate\Http\Request;
use App\Models\MaritalStatus;
use App\Models\MarriageDivorce;
use App\Models\MasterPopulation;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PopulationController extends Controller
{
    public function countGenerals()
    {
        $count_population = MasterPopulation::count();
        $count_male  = MasterPopulation::where('gender_id', 1)->count();
        $count_female = MasterPopulation::where('gender_id', 2)->count();
        $count_workers = MasterPopulation::where('profession_id', '!=', 1)->count();
        $count_death = MasterPopulation::where('exit_type_id', 2)->count();
        $count_kk = Birth::distinct('no_kk')->count('no_kk');

        $data = [
            'status' => true,
            'message' => 'Menampilkan Informasi Umum Penduduk',
            'data' => [
                'Jumlah Penduduk' => $count_population,
                'Kepala Keluarga' => $count_kk,
                'Laki Laki' => $count_male,
                'Perempuan' => $count_female,
                'Bekerja' => $count_workers,
                'Meninggal' => $count_death,
            ],
        ];

        return response()->json($data, 200);
    }

    public function countDeaths()
    {
        $currentYear = date('Y');
        $startYear = $currentYear - 4;

        $years = range($startYear, $currentYear);

        $deaths = Death::select('dod')
            ->whereYear('dod', '>=', $startYear)
            ->whereYear('dod', '<=', $currentYear)
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->dod)->format('Y');
            });

        $deathsPerYear = [];

        foreach ($years as $year) {
            $deathsPerYear[] = [
                'Tahun' => $year,
                'Jumlah Kematian' => isset($deaths[$year]) ? $deaths[$year]->count() : 0
            ];
        }

        $data = [
            'status' => true,
            'message' => 'Menampilkan Statistik Penduduk berdasarkan Kematian',
            'data' => $deathsPerYear
        ];


        return response()->json($data, 200);
    }
    public function countGenders()
    {
        $total_populations = MasterPopulation::count();
        $male_populations  = MasterPopulation::where('gender_id', 1)->count();
        $female_populations = MasterPopulation::where('gender_id', 2)->count();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Statistik Penduduk berdasarkan Jenis Kelamin',
            'data' => [
                'Total' => $total_populations,
                'Laki laki' => $male_populations,
                'Perempuan' => $female_populations,
            ],
        ];

        return response()->json($data, 200);
    }

    public function countCivics()
    {
        $wni_civics  = MasterPopulation::where('civic_id', 1)->count();
        $wna_civics = MasterPopulation::where('civic_id', 2)->count();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Statistik Penduduk berdasarkan Kewarganegaraan',
            'data' => [
                'WNI' => $wni_civics,
                'WNA' => $wna_civics,
            ],
        ];

        return response()->json($data, 200);
    }

    public function countReligions()
    {
        $islam  = MasterPopulation::where('religion_id', 1)->count();
        $kristen_protestan  = MasterPopulation::where('religion_id', 2)->count();
        $hindu  = MasterPopulation::where('religion_id', 4)->count();
        $buddha  = MasterPopulation::where('religion_id', 5)->count();
        $kristen_katolik  = MasterPopulation::where('religion_id', 3)->count();
        $konghucu  = MasterPopulation::where('religion_id', 6)->count();
        $others  = MasterPopulation::where('religion_id', 7)->count();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Statistik Penduduk berdasarkan Agama',
            'data' => [
                'Islam' => $islam,
                'Kristen Protestan' => $kristen_protestan,
                'Hindu' => $hindu,
                'Buddha' => $buddha,
                'Kristen Katolik' => $kristen_katolik,
                'Konghucu' => $konghucu,
                'Lainnya' => $others,
            ],
        ];

        return response()->json($data, 200);
    }

    public function countEducations()
    {
        $educations = Education::all();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Statistik Penduduk berdasarkan Pendidikan',
            'data' => [],
        ];

        foreach ($educations as $education) {
            $data['data'][$education->name] = MasterPopulation::where('education_id', $education->id)->count();
        }

        return response()->json($data, 200);
    }

    public function countProfessions()
    {
        $professionsWithCount = Profession::whereHas('master_populations')
            ->withCount('master_populations')
            ->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Statistik Penduduk berdasarkan Pekerjaan',
            'data' => [],
        ];

        foreach ($professionsWithCount as $profession) {
            $data['data'][$profession->name] = $profession->master_populations_count;
        }

        return response()->json($data, 200);
    }

    public function countMarriageStatuses()
    {
        $maritalStatuses = [
            2 => 'Menikah',
            1 => 'Belum Menikah',
            3 => 'Cerai Hidup',
            4 => 'Cerai Mati',
            5 => 'Kawin Tercatat',
            6 => 'Kawin Tidak Tercatat',
        ];

        $counts = MasterPopulation::with(['marriageDivorces.maritalStatus'])
            ->get()
            ->flatMap(function ($population) {
                return $population->marriageDivorces->map(function ($divorce) {
                    return $divorce->maritalStatus->id;
                });
            })
            ->countBy();

        $responseData = [];
        foreach ($maritalStatuses as $id => $status) {
            if ($id == 3 || $id == 4) {
                $responseData['Bercerai'] = ($responseData['Bercerai'] ?? 0) + $counts->get($id, 0);
            } else {
                $responseData[$status] = $counts->get($id, 0);
            }
        }

        $responseData['Bercerai'] = $responseData['Bercerai'] ?? 0;

        $data = [
            'status' => true,
        'message' => 'Menampilkan Statistik Penduduk berdasarkan Status Perkawinan',
            'data' => $responseData,
        ];

        return response()->json($data);
    }
}
