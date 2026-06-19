<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\PelabuhanController;

use Illuminate\Support\Facades\Route;

Route::get('/', [PageController::class, 'home'])->name('home');

Route::get('/map', [PageController::class, 'map'])->name('map');