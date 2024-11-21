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
    Route::get('/populations/ages-statistics', [API\Public\PopulationController::class, 'annualAgeStatistics']);
    Route::get('/populations/deaths', [API\Public\PopulationController::class, 'countDeaths']);
    Route::get('/populations/genders', [API\Public\PopulationController::class, 'countGenders']);
    Route::get('/populations/educations', [API\Public\PopulationController::class, 'countEducations']);
    Route::get('/populations/professions', [API\Public\PopulationController::class, 'countProfessions']);
    Route::get('/populations/marriages', [API\Public\PopulationController::class, 'countMarriageStatuses']);
    Route::get('/populations/religions', [API\Public\PopulationController::class, 'countReligions']);
    Route::get('/populations/civics', [API\Public\PopulationController::class, 'countCivics']);

    Route::prefix('home')->group(function(){
        Route::get('/sliders', [API\Public\HomeController::class, 'slider']);
        Route::get('/contacts', [API\Public\HomeController::class, 'contact']);
        Route::get('/social-media', [API\Public\HomeController::class, 'socialMedia']);
        Route::get('/profile-summary', [API\Public\HomeController::class, 'profileSummary']);
        Route::get('/general-information', [API\Public\HomeController::class, 'showGeneralInformation']);
        Route::get('/village-information', [API\Public\HomeController::class, 'showVillageInformation']);
        Route::get('/location', [API\Public\HomeController::class, 'showLocation']);
        Route::get('/government-structure', [API\Public\HomeController::class, 'showGovernmentStructure']);
        Route::get('/organization-structure', [API\Public\HomeController::class, 'showOrganizationStructure']);
        Route::get('/vision-mission', [API\Public\HomeController::class, 'showVisionMission']);
        Route::get('/history', [API\Public\HomeController::class, 'showHistory']);
        Route::get('/area-desc', [API\Public\HomeController::class, 'showAreaDesc']);
    });

    Route::get('/news', [API\Public\NewsController::class, 'index']);
    Route::get('/latest-news/{news}', [API\Public\NewsController::class, 'latestNewsExceptVisited']);
    Route::get('/latest-news', [API\Public\NewsController::class, 'latestNews']);
    Route::get('/news/{news}', [API\Public\NewsController::class, 'show']);

    Route::get('/travel-articles', [API\Public\TravelArticleController::class, 'index']);
    Route::get('/travel-articles/{travel_article}', [API\Public\TravelArticleController::class, 'show']);
    Route::get('/travel-articles-except/{travel_article}', [API\Public\TravelArticleController::class, 'exceptVisited']);

    Route::get('/activities', [API\Public\ActivityController::class, 'showActivity']);

    Route::get('/products', [API\Public\ProductController::class, 'index']);
    Route::get('/products/{product}', [API\Public\ProductController::class, 'show']);
    Route::get('/other-products/{product}', [API\Public\ProductController::class, 'otherProduct']);

    Route::get('/farm-produces/highest', [API\Public\FarmProduceController::class, 'highestProductionLevel']);
    Route::get('/farm-produces/others', [API\Public\FarmProduceController::class, 'otherProductionLevels']);

    // Route::get('/bansos', [API\Public\BansosController::class, 'index']);
    // Route::get('/bansos/{nik}', [API\Public\BansosController::class, 'getBansosByNik']);

    Route::get('/facilities', [API\Public\FacilityController::class, 'index']);
    Route::get('/facilities/list', [API\Public\FacilityController::class, 'index2']);
    Route::get('/worship-facilities', [API\Public\FacilityController::class, 'countWorshipFacility']);
    Route::get('/worship-facilities/list', [API\Public\FacilityController::class, 'getWorshipFacility']);
    Route::get('/tourist-destination', [API\Public\FacilityController::class, 'countTouristDestination']);
    Route::get('/tourist-destination/list', [API\Public\FacilityController::class, 'getTouristDestination']);
    
    Route::get('/years', [API\Public\ApbDesaController::class, 'getLastFiveYears']);
    Route::get('/apb-desa/generals', [API\Public\ApbDesaController::class, 'index']);
    Route::get('/apb-desa/revenues-and-expenses/title', [API\Public\ApbDesaController::class, 'titleRevenueAndExpense']);
    Route::get('/apb-desa/revenues-and-expenses', [API\Public\ApbDesaController::class, 'countRevenueAndExpense']);
    Route::get('/apb-desa/revenues/title', [API\Public\ApbDesaController::class, 'titleRevenue']);
    Route::get('/apb-desa/revenues', [API\Public\ApbDesaController::class, 'countRevenue']);
    Route::get('/apb-desa/revenues/list', [API\Public\ApbDesaController::class, 'getRevenue']);
    Route::get('/apb-desa/expenses/title', [API\Public\ApbDesaController::class, 'titleExpense']);
    Route::get('/apb-desa/expenses', [API\Public\ApbDesaController::class, 'countExpense']);
    Route::get('/apb-desa/expenses/list', [API\Public\ApbDesaController::class, 'getExpense']);
    Route::get('/apb-desa/outlay/title', [API\Public\ApbDesaController::class, 'titleOutlay']);
    Route::get('/apb-desa/outlay', [API\Public\ApbDesaController::class, 'countOutlay']);
    Route::get('/apb-desa/outlay/list', [API\Public\ApbDesaController::class, 'getOutlay']);

    Route::get('/idm/status-and-score', [API\Public\IdmController::class, 'getStatusAndScore']);
    Route::get('/idm/generals', [API\Public\IdmController::class, 'getIdmInfo']);
    Route::get('/idm/annual-statistics', [API\Public\IdmController::class, 'getAnnualStatistics']);
});
