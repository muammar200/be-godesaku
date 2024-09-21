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
                    "name" => "BumDes",
                ],
                [
                    "id" => 2,
                    "name" => "Wisata Desa",
                ],
                [
                    "id" => 3,
                    "name" => "Fasilitas Umum",
                ],
            ]  
        ];

        return response()->json($data);
    });
    Route::get('/listing-locations/{id}', function ($id) {
        $locations = [
            'status' => true,
            'message' => 'Show Listing By Category Id Success',
            'data' => [
                1 => [
                    [
                        "id" => 1,
                        "name" => "Sultan Ayam Geprek Samata",
                        "latitude" => -5.20218,
                        "longitude" => 119.49572
                    ],
                    [
                        "id" => 2,
                        "name" => "Bokatana Samata",
                        "latitude" => -5.20196,
                        "longitude" => 119.49466
                    ]
                ],
                2 => [
                    [
                        "id" => 3,
                        "name" => "Bukit Samata",
                        "latitude" => -5.20083,
                        "longitude" => 119.49733
                    ],
                ],
                3 => [
                    [
                        "id" => 4,
                        "name" => "UPT Perpustakaan Syekh Yusuf UIN Alauddin Makassar",
                        "latitude" => -5.20667,
                        "longitude" => 119.49751
                    ],
                    [
                        "id" => 5,
                        "name" => "Puskesmas Samata",
                        "latitude" => -5.20103,
                        "longitude" => 119.48786
                    ]
                ]
            ]
        ];

        if (isset($locations[$id])) {
            $response = $locations[$id];
        } else {
            $response = [
                "error" => "Location not found"
            ];
        }

        return response()->json($response);
    });

    Route::get('/news', [API\Public\NewsController::class, 'index']);
    Route::get('/news/{news}', [API\Public\NewsController::class, 'show']);
    Route::get('/travel-articles', [API\Public\TravelArticleController::class, 'index']);
    Route::get('/travel-articles/{travel_article}', [API\Public\TravelArticleController::class, 'show']);
});
