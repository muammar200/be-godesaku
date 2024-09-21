<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;

Route::prefix('admin')->group(function () {
    Route::apiResource('news', API\NewsController::class);
    Route::apiResource('travel-articles', API\TravelArticleController::class);
});

Route::prefix('public')->group(function () {
    Route::get('/locations', function () {
        $locations = [
            "BumDes" => [
                [
                    "name" => "Sultan Ayam Geprek Samata",
                    "latitude" => -5.20218,
                    "longitude" => 119.49572
                ],
                [
                    "name" => "Bokatana Samata",
                    "latitude" => -5.20196,
                    "longitude" => 119.49466
                ]
            ],
            "Wisata Desa" => [
                [
                    "name" => "Bukit Samata",
                    "latitude" => -5.20083,
                    "longitude" => 119.49733
                ],
            ],
            "Fasilitas Umum" => [
                [
                    "name" => "UPT Perpustakaan Syekh Yusuf UIN Alauddin Makassar",
                    "latitude" => -5.20667,
                    "longitude" => 119.49751
                ],
                [
                    "name" => "Puskesmas Samata",
                    "latitude" => -5.20103,
                    "longitude" => 119.48786
                ]
            ]
        ];

        return response()->json($locations);
    });
    Route::get('/news', [API\Public\NewsController::class, 'index']);
    Route::get('/news/{news}', [API\Public\NewsController::class, 'show']);
    Route::get('/travel-articles', [API\Public\TravelArticleController::class, 'index']);
    Route::get('/travel-articles/{travel_article}', [API\Public\TravelArticleController::class, 'show']);
});
