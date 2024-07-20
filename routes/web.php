<?php

use App\Http\Controllers\OsuApiController;
use App\Http\Controllers\RegionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/regions', [RegionController::class, 'index']);

Route::get('/regions/{id}', [RegionController::class, 'show']);

Route::get('/sotw', function () {
    return view('sotw');
});

Route::get('/players', [OsuApiController::class, 'updatePlayersData']);
