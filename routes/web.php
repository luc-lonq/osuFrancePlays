<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\SotwController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\OsuUserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [IndexController::class, 'index']);

Route::get('/regions', [RegionController::class, 'index']);
Route::get('/regions/{id}', [RegionController::class, 'show']);
Route::get('/regions/{id}/history', [RegionController::class, 'history']);
Route::get('/regions/{id}/history/{date}', [RegionController::class, 'history']);

Route::get('/sotw', [SotwController::class, 'show']);
Route::get('/sotw/stats/', [SotwController::class, 'stats']);
Route::get('/sotw/stats/{year}', [SotwController::class, 'stats']);
Route::get('/sotw/{date}', [SotwController::class, 'show']);

Route::get('/players/settings', [PlayerController::class, 'edit']);
Route::post('/players/update/{id}', [PlayerController::class, 'update']);
Route::get('/players/{id}', [PlayerController::class, 'show']);

Route::get('/staff', [IndexController::class, 'staff']);

Route::get('/admin', [AdminController::class, 'index']);
Route::get('/admin/sotw', [AdminController::class, 'sotw']);
Route::get('/admin/sotw/create', [AdminController::class, 'sotwCreate']);
Route::post('/admin/sotw/store', [AdminController::class, 'sotwStore']);
Route::get( '/admin/sotw/edit/{id}', [AdminController::class, 'sotwEdit']);
Route::post('/admin/sotw/update/{id}', [AdminController::class, 'sotwUpdate']);
Route::delete( '/admin/sotw/delete/{id}', [AdminController::class, 'sotwDelete']);
Route::get('/admin/scores', [AdminController::class, 'scores']);
Route::get('/admin/users', [AdminController::class, 'users']);
Route::post('/admin/user/update/{id}', [AdminController::class, 'userUpdate']);
Route::get('/admin/players', [AdminController::class, 'players']);
Route::get('/admin/players/create', [AdminController::class, 'playerCreate']);
Route::post('/admin/players/store', [AdminController::class, 'playerStore']);
Route::get('/admin/player/{id}', [AdminController::class, 'playerShow']);
Route::post('/admin/player/update/{id}', [AdminController::class, 'playerUpdate']);
Route::get('/admin/marbles', [AdminController::class, 'marbles']);
Route::post('/admin/marbles/create', [AdminController::class, 'marblesCreate']);
Route::delete('/admin/marbles/delete/{id}', [AdminController::class, 'marblesDelete']);

Route::get('/login', [OsuUserController::class, 'login']);
Route::get('/logout', [OsuUserController::class, 'logout']);
