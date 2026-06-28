<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\SongController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('artists' , ArtistController::class);
Route::resource('albums' , AlbumController::class);
Route::resource('songs', SongController::class);

