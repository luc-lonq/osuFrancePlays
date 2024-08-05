<?php

use App\Http\Controllers\OsuApiController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SotwController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/regions', [RegionController::class, 'index']);

Route::get('/regions/{id}', [RegionController::class, 'show']);

Route::get('/regions/{id}/history', [RegionController::class, 'history']);

Route::get('/regions/{id}/history/{date}', [RegionController::class, 'history']);

Route::get('/sotw', [SotwController::class, 'show']);

Route::get('/sotw/stats/', [SotwController::class, 'stats']);

Route::get('/sotw/{date}', [SotwController::class, 'show']);

Route::get('/players', [OsuApiController::class, 'updatePlayersData']);
