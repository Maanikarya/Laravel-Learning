<?php

use App\Http\Controllers\Api\SongController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/maanik', function () {
    return "Hello, this is Maanik";
});

// Route::get('/token', function (Request $request) {
//     $token = $request->session()->token();
 
//     // $token = csrf_token();
//     return $token;
    
// });

// Route::resource('songs' , SongController::class);

