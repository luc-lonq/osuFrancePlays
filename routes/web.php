<?php

use App\Models\Player;
use App\Models\Region;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/regions', function () {
    $regions = Region::all();
    return view('regions', ['regions' => $regions]);
});

Route::get('/regions/{id}', function ($id) {
    $regions = Region::all();
    $players = Player::findByRegion($id);
    return view('regions',
        [
            'regions' => $regions,
            'players' => $players
        ]);
});

Route::get('/sotw', function () {
    return view('sotw');
});
