<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSongsRequest;
use Illuminate\Http\Request;
use App\Models\Song;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::
                latest()
                ->paginate(10);
        
        return response()->json($songs);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSongsRequest $request)
    {

        $song = Song::create($request->validated());

        $response = [
            'success' => true,
            'message' => 'Song Created Successfully!!'
        ];

        return response()->json($response);
    }


    public function createSong(Request $request){
        
        $request->validate([
            'album_id' => [
                'required'
            ],
            'genre_id' => [
                'required'
            ],
            'title' => [
                'required',
                'string',
                'max:255'
            ],
        ]);


        Song::create([
            'album_id' => $request->album_id,
            'genre_id' => $request->genre_id,
            'title' => $request->title,
            'duration' => 0,
            'audio_path' => ""
        ]);


        $response = [
            'success' => true,
            'message' => 'Song Created Successfully!!'
        ];

        return response()->json($response);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
