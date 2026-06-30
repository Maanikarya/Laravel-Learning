<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SongController;
use App\Http\Controllers\Api\PlaylistController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::resource('songs' , SongController::class);

// Route::get('/createSong' ,  [SongController::class , 'createSong']);

Route::get('/createSong', [SongController::class, 'createSong']);
Route::get('/createPlaylist' , [PlaylistController::class , 'createPlaylist']);