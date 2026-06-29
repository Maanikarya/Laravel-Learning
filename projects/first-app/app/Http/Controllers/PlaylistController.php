<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlaylistRequest;
use App\Http\Requests\UpdatePlaylistRequest;
use App\Models\Playlist;
use App\Models\Song;
use App\Models\User;
use App\Services\PlaylistService;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{

    public function __construct(private PlaylistService $playlist_service)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $playlists = Playlist::with('user')
                            ->withCount('songs')
                            ->latest()
                            ->paginate(10);
        // dd($playlists->toArray());
        return view('playlists.index' , compact('playlists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::pluck('name' , 'id');
        $songs = Song::pluck('title' , 'id');

        return view('playlists.create' , [
            'users' => $users,
            'songs' => $songs,
            'playlist' => new Playlist()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlaylistRequest $request)
    {
        //Call the Service
        $this->playlist_service->create($request->validated());

        return redirect()->route('playlists.index')->with('success' , 'Playlist created successfully');
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
    public function edit(Playlist $playlist)
    {
        $playlist->load('songs');

        $users = User::pluck('name' , 'id');
        $songs = Song::pluck('title' , 'id');

        return view('playlists.edit' , [
            'users' => $users,
            'songs' => $songs,
            'playlist' => $playlist
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlaylistRequest $request, Playlist $playlist)
    {
        //Call the Service
        $this->playlist_service->update($playlist , $request->validated());

        return redirect()->route('playlists.index')->with('success' , 'Playlist Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Playlist $playlist)
    {
        //Call the Service
        $this->playlist_service->delete($playlist);
        return redirect()->route('playlists.index')->with('success' , 'Playlist Deleted successfully');
    }
}
