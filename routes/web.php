<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/regions', function () {
    return view('regions');
});

Route::get('/sotw', function () {
    return view('sotw');
});
