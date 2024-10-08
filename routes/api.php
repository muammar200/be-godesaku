<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;

Route::prefix('admin')->group(function () {
    Route::apiResource('news', API\NewsController::class);
    Route::apiResource('travel-articles', API\TravelArticleController::class);
});

Route::prefix('public')->group(function () {
    Route::get('/listing-categories', function () {
        $data = [
            'status' => true,
            'message' => 'Show Listing Categories Success',
            'data' =>[
                [
                    "id" => 1,
                    "name" => "Lihat Semua",
                ],
                [
                    "id" => 2,
                    "name" => "BumDes",
                ],
                [
                    "id" => 3,
                    "name" => "Wisata Desa",
                ],
                [
                    "id" => 4,
                    "name" => "Fasilitas Umum",
                ],
            ]  
        ];

        return response()->json($data);
    });
    Route::get('/listing-locations/1', function () {
        $locations = [
            'status' => true,
            'message' => 'Show All Listing Success',
            'data' => [
                    [
                        "id" => 1,
                        "name" => "Sultan Ayam Geprek Samata",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20218,
                        "longitude" => 119.49572
                    ],
                    [
                        "id" => 2,
                        "name" => "Bokatana Samata",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20196,
                        "longitude" => 119.49466
                    ],
                    [
                        "id" => 3,
                        "name" => "Bukit Samata",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20083,
                        "longitude" => 119.49733
                    ],
                    [
                        "id" => 4,
                        "name" => "UPT Perpustakaan Syekh Yusuf UIN Alauddin Makassar",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20667,
                        "longitude" => 119.49751
                    ],
                    [
                        "id" => 5,
                        "name" => "Puskesmas Samata",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20103,
                        "longitude" => 119.48786
                    ]
                ]
        ];

        // if (isset($locations['data'][$id])) {
        //     $response = [
        //         'status' => true,
        //         'message' => $locations['message'],
        //         'data' => $locations['data'][$id]
        //     ];
        // } else {
        //     return response()->json([
        //         'status' => false,
        //         'message' => 'Location not found',
        //         'data' => []
        //     ], 404); 
        // }

        return response()->json($locations);

    });
    Route::get('/listing-locations/{id}', function ($id) {
        $locations = [
            'status' => true,
            'message' => 'Show Listing By Category Id Success',
            'data' => [
                2 => [
                    [
                        "id" => 1,
                        "name" => "Sultan Ayam Geprek Samata",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20218,
                        "longitude" => 119.49572
                    ],
                    [
                        "id" => 2,
                        "name" => "Bokatana Samata",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20196,
                        "longitude" => 119.49466
                    ]
                ],
                3 => [
                    [
                        "id" => 3,
                        "name" => "Bukit Samata",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20083,
                        "longitude" => 119.49733
                    ],
                ],
                4 => [
                    [
                        "id" => 4,
                        "name" => "UPT Perpustakaan Syekh Yusuf UIN Alauddin Makassar",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20667,
                        "longitude" => 119.49751
                    ],
                    [
                        "id" => 5,
                        "name" => "Puskesmas Samata",
                        "location" => "Samata, Gowa",
                        "latitude" => -5.20103,
                        "longitude" => 119.48786
                    ]
                ]
            ]
        ];

        if (isset($locations['data'][$id])) {
            $response = [
                'status' => true,
                'message' => $locations['message'],
                'data' => $locations['data'][$id]
            ];
        } else {
            return response()->json([
                'status' => false,
            'message' => 'Location not found',
                'data' => []
            ], 404); 
        }

        return response()->json($response);

    });

    // Route::prefix('teschart')->group(function(){
    //     Route::get('/jumlah-penduduk', [API\PendudukController::class, 'getPendudukByAgeCategoryEachYear']);
    //     Route::get('/jenis-kelamin', function(){
            
    //     });
    // });
    Route::get('/populations/generals', [API\Public\PopulationController::class, 'countGenerals']);
    // Route::get('/populations/ages', [API\Public\PopulationController::class, 'countAges']);
    Route::get('/populations/deaths', [API\Public\PopulationController::class, 'countDeaths']);
    Route::get('/populations/genders', [API\Public\PopulationController::class, 'countGenders']);
    Route::get('/populations/educations', [API\Public\PopulationController::class, 'countEducations']);
    Route::get('/populations/professions', [API\Public\PopulationController::class, 'countProfessions']);
    Route::get('/populations/marriages', [API\Public\PopulationController::class, 'countMarriageStatuses']);
    Route::get('/populations/religions', [API\Public\PopulationController::class, 'countReligions']);
    Route::get('/populations/civics', [API\Public\PopulationController::class, 'countCivics']);

    Route::prefix('home')->group(function(){
        Route::get('/sliders', [API\Public\HomeController::class, 'slider']);
    });

    Route::get('/news', [API\Public\NewsController::class, 'index']);
    Route::get('/latest-news/{news}', [API\Public\NewsController::class, 'latestNewsExceptVisited']);
    Route::get('/latest-news', [API\Public\NewsController::class, 'latestNews']);
    Route::get('/news/{news}', [API\Public\NewsController::class, 'show']);
    Route::get('/travel-articles', [API\Public\TravelArticleController::class, 'index']);
    Route::get('/travel-articles/{travel_article}', [API\Public\TravelArticleController::class, 'show']);
});
