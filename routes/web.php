<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\OsuApiController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SotwController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\OsuUserController;
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
Route::get('/sotw/stats/{year}', [SotwController::class, 'stats']);
Route::get('/sotw/{date}', [SotwController::class, 'show']);

Route::get('/players', [OsuApiController::class, 'updatePlayersData']);
Route::get('/players/{id}', [PlayerController::class, 'show']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/sotw', [AdminController::class, 'sotw']);
Route::get('/admin/sotw/create', [AdminController::class, 'sotwCreate']);
Route::post('/admin/sotw/store', [AdminController::class, 'sotwStore']);
Route::get( '/admin/sotw/edit/{id}', [AdminController::class, 'sotwEdit']);
Route::post('/admin/sotw/update/{id}', [AdminController::class, 'sotwUpdate']);

Route::get('/login', [OsuUserController::class, 'login']);
Route::get('/logout', [OsuUserController::class, 'logout']);
