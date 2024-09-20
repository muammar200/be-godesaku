<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API;

Route::prefix('admin')->group(function(){
    Route::apiResource('news', API\NewsController::class);
});

Route::prefix('public')->group(function(){
    Route::get('/news', [API\Public\NewsController::class, 'index']);
    Route::get('/news/{news}', [API\Public\NewsController::class, 'show']);
});