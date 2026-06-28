<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ArtistController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/artists' , ArtistController::class);