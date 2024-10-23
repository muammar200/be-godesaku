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
                ['id' => 1, 'image' => url('storage/images/populations/jumlah-penduduk.png'), 'title' => 'Jumlah Penduduk', 'total' => $count_population],
                ['id' => 2, 'image' => url('storage/images/populations/kepala-keluarga.png'), 'title' => 'Kepala Keluarga', 'total' => $count_kk],
                ['id' => 3, 'image' => url('storage/images/populations/laki-laki.png'), 'title' => 'Laki laki', 'total' => $count_male],
                ['id' => 4, 'image' => url('storage/images/populations/perempuan.png'), 'title' => 'Perempuan', 'total' => $count_female],
                ['id' => 5, 'image' => url('storage/images/populations/bekerja.png'), 'title' => 'Bekerja', 'total' => $count_workers],
                ['id' => 6, 'image' => url('storage/images/populations/meninggal.png'), 'title' => 'Meninggal', 'total' => $count_death],
            ],
        ];

        return response()->json($data, 200);
    }

    // public function annualAgeStatistics()
    // {
    //     //hitung juga yang meninggal

    //     $currentYear = Carbon::now()->year;

    //     // Menyiapkan array untuk menyimpan statistik per tahun
    //     $annualStatistics = [];

    //     // Looping untuk mendapatkan statistik dari 5 tahun terakhir
    //     for ($year = $currentYear - 4; $year <= $currentYear; $year++) {
    //         // Menghitung kategori umur untuk tahun tertentu
    //         $ageGroups = [
    //             'Anak-Anak 0 - 14 Tahun' => 0,
    //             'Remaja 15 - 24 Tahun' => 0,
    //             'Dewasa 25 - 59 Tahun' => 0,
    //             'Lansia 60 Tahun Keatas' => 0,
    //         ];

    //         $populations = MasterPopulation::with('birth')->get();

    //         foreach ($populations as $population) {
    //             if ($population->birth) {
    //                 // Menghitung umur berdasarkan tahun iterasi (bukan hanya tanggal lahir)
    //                 $age = Carbon::createFromDate($population->birth->dob)->diffInYears(Carbon::createFromDate($year, 1, 1));

    //                 // Memasukkan ke dalam kelompok umur yang sesuai
    //                 if ($age <= 14) {
    //                     $ageGroups['Anak-Anak 0 - 14 Tahun']++;
    //                 } elseif ($age <= 24) {
    //                     $ageGroups['Remaja 15 - 24 Tahun']++;
    //                 } elseif ($age <= 59) {
    //                     $ageGroups['Dewasa 25 - 59 Tahun']++;
    //                 } else {
    //                     $ageGroups['Lansia 60 Tahun Keatas']++;
    //                 }
    //             }
    //         }

    //         // Menyimpan data statistik per tahun
    //         $annualStatistics[$year] = $ageGroups;
    //     }

    //     $data = [
    //         'status' => true,
    //         'message' => 'Menampilkan Statistik Usia Penduduk 5 Tahun Terakhir',
    //         'data' => $annualStatistics
    //     ];

    //     return response()->json($data, 200);
    // }

    public function annualAgeStatistics()
    {
        // Tahun saat ini
        $currentYear = Carbon::now()->year;

        // Menyiapkan struktur data untuk judul kategori umur
        $ageCategories = [
            ['title' => ['Anak-anak', '0 - 14 Tahun']],
            ['title' => ['Remaja', '15 - 24 Tahun']],
            ['title' => ['Dewasa', '25 - 59 Tahun']],
            ['title' => ['Lansia', '60 Tahun Keatas']]
        ];

        // Menyiapkan array untuk menyimpan statistik per tahun
        $annualStatistics = [];

        // Looping untuk mendapatkan statistik dari 5 tahun terakhir
        for ($year = $currentYear - 4; $year <= $currentYear; $year++) {
            // Menghitung jumlah populasi per kategori umur
            $totals = [0, 0, 0, 0]; // Urutan: Anak-anak, Remaja, Dewasa, Lansia

            $populations = MasterPopulation::with('birth')->get();

            foreach ($populations as $population) {
                if ($population->birth) {
                    // Menghitung umur berdasarkan tahun iterasi
                    $age = Carbon::createFromDate($population->birth->dob)->diffInYears(Carbon::createFromDate($year, 1, 1));

                    // Memasukkan ke dalam kelompok umur yang sesuai
                    if ($age <= 14) {
                        $totals[0]++;
                    } elseif ($age <= 24) {
                        $totals[1]++;
                    } elseif ($age <= 59) {
                        $totals[2]++;
                    } else {
                        $totals[3]++;
                    }
                }
            }

            // Menyimpan data per tahun dalam struktur yang diinginkan
            $annualStatistics[] = [
                'id' => $year - ($currentYear - 5), // ID unik per tahun
                'year' => (string) $year,
                'total' => $totals
            ];
        }

        // Menyusun respons dengan data kategori dan statistik tahunan
        $data = [
            'status' => true,
            'message' => 'Menampilkan Statistik Usia Penduduk 5 Tahun Terakhir',
            'category' => $ageCategories,
            'data' => $annualStatistics
        ];

        return response()->json($data, 200);
    }


    // public function countDeaths()
    // {
    //     $currentYear = date('Y');
    //     $startYear = $currentYear - 4;

    //     $years = range($startYear, $currentYear);

    //     $deaths = Death::select('dod')
    //         ->whereYear('dod', '>=', $startYear)
    //         ->whereYear('dod', '<=', $currentYear)
    //         ->get()
    //         ->groupBy(function ($date) {
    //             return Carbon::parse($date->dod)->format('Y');
    //         });

    //     $deathsPerYear = [];

    //     foreach ($years as $year) {
    //         $deathsPerYear[] = [
    //             'Tahun' => $year,
    //             'Jumlah Kematian' => isset($deaths[$year]) ? $deaths[$year]->count() : 0
    //         ];
    //     }

    //     $data = [
    //         'status' => true,
    //         'message' => 'Menampilkan Statistik Penduduk berdasarkan Kematian',
    //         'data' => $deathsPerYear
    //     ];


    //     return response()->json($data, 200);
    // }

    public function countDeaths()
    {
        $currentYear = date('Y');
        $startYear = $currentYear - 4;

        // Membuat array tahun dari 5 tahun terakhir
        $years = range($startYear, $currentYear);

        // Mendapatkan data kematian dari database berdasarkan rentang tahun
        $deaths = Death::select('dod')
            ->whereYear('dod', '>=', $startYear)
            ->whereYear('dod', '<=', $currentYear)
            ->get()
            ->groupBy(function ($date) {
                return Carbon::parse($date->dod)->format('Y');
            });

        // Menyiapkan array untuk menyimpan statistik kematian per tahun
        $deathsPerYear = [];

        // Menghitung jumlah kematian untuk setiap tahun dan menyusun dalam struktur yang diinginkan
        foreach ($years as $index => $year) {
            $deathsPerYear[] = [
                'id' => $index + 1,  // ID urut dimulai dari 1
                'year' => (string) $year,  // Tahun dalam format string
                'total' => [isset($deaths[$year]) ? $deaths[$year]->count() : 0]  // Total kematian disimpan dalam array
            ];
        }

        // Menyusun respons dengan data statistik kematian
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
                // 'Total' => $total_populations,
                // 'Laki laki' => $male_populations,
                // 'Perempuan' => $female_populations,
                [
                    'label' => 'Laki laki',
                    'total' => $male_populations
                ],
                [
                    'label' => 'Perempuan',
                    'total' => $female_populations
                ]
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
                'Kepercayaan Lainnya' => $others,
            ],
        ];

        return response()->json($data, 200);
    }

    // public function countEducations()
    // {
    //     $educations = Education::all();

    //     $data = [
    //         'status' => true,
    //         'message' => 'Menampilkan Statistik Penduduk berdasarkan Pendidikan',
    //         'data' => [],
    //     ];

    //     foreach ($educations as $education) {
    //         $data['data'][$education->name] = MasterPopulation::where('education_id', $education->id)->count();
    //     }

    //     return response()->json($data, 200);
    // }

    public function countEducations()
    {
        $educations = Education::orderBy('id', 'desc')->get();

        $data = [
            'status' => true,
            'message' => 'Menampilkan Statistik Penduduk berdasarkan Pendidikan',
            'data' => [],
        ];

        $id = 1;

        foreach ($educations as $education) {
            $data['data'][] = [
                'id' => $id++,
                'name' => $education->name,
                'total' => MasterPopulation::where('education_id', $education->id)->count(),
            ];
        }

        return response()->json($data, 200);
    }



    // public function countProfessions()
    // {
    //     $professionsWithCount = Profession::whereHas('master_populations')
    //         ->withCount('master_populations')
    //         ->get();

    //     $data = [
    //         'status' => true,
    //         'message' => 'Menampilkan Statistik Penduduk berdasarkan Pekerjaan',
    //         'data' => [],
    //     ];

    //     foreach ($professionsWithCount as $profession) {
    //         $data['data'][$profession->name] = $profession->master_populations_count;
    //     }

    //     return response()->json($data, 200);
    // }

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

        $id = 1;

        foreach ($professionsWithCount as $profession) {
            $data['data'][] = [
                'id' => $id++,
                'title' => $profession->name,
                'total' => $profession->master_populations_count,
            ];
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
            // 'data' => $responseData,
            'data' => [
                ['id' => 1, 'image' => url('storage/images/populations/menikah.png'), 'title' => 'Menikah', 'total' => $responseData['Menikah']],
                ['id' => 2, 'image' => url('storage/images/populations/belum_menikah.png'), 'title' => 'Belum Menikah', 'total' => $responseData['Belum Menikah']],
                ['id' => 3, 'image' => url('storage/images/populations/bercerai.png'), 'title' => 'Bercerai', 'total' => $responseData['Belum Menikah']],
                ['id' => 4, 'image' => url('storage/images/populations/kawin_tercatat.png'), 'title' => 'Kawin Tercatat', 'total' => $responseData['Kawin Tercatat']],
                ['id' => 5, 'image' => url('storage/images/populations/kawin_tercatat.png'), 'title' => 'Kawin Tidak Tercatat', 'total' => $responseData['Kawin Tidak Tercatat']],
            ],
        ];

        return response()->json($data);
    }
}
