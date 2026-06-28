<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSongRequest;
use App\Http\Requests\UpdateSongRequest;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Song;
use App\Models\Genre;
use App\Services\SongService;
use Illuminate\Http\Request;

class SongController extends Controller
{
    public function __construct(private SongService $songService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::with(['artist' , 'album' , 'genre'])
        ->latest()
        ->paginate(10);
        return view('songs.index',compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = Artist::orderBy('name')->get();
        $albums = Album::orderBy('title')->get();
        $genres = Genre::orderBy('name')->get();
        return view('songs.create' , [
            'song' => new Song(),
            'artists' => $artists,
            'albums' => $albums,
            'genres' => $genres
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSongRequest $request)
    {
        // Call the Service
        $this->songService->create($request->validated());

        return redirect()
        ->route('songs.index')
        ->with('success' , 'Song Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {
        return view('songs.show' , compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        $artists = Artist::orderBy('name')->get();
        $albums = Album::orderBy('title')->get();
        $genres = Genre::orderBy('name')->get();
        return view('songs.edit' , [
            'song' => $song,
            'artists' => $artists,
            'albums' => $albums,
            'genres' => $genres
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSongRequest $request, Song $song)
    {
        // Call the Service
        $this->songService->update($song , $request->validated());

        return redirect()
        ->route('songs.index')
        ->with('success' , 'Song Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Song $song)
    {
        // Call the Service
        $this->songService->delete($song);

        return redirect()
        ->route('songs.index')
        ->with('success' , 'Song Delete Successfully');
    }
}
