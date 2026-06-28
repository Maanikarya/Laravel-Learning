<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAlbumRequest;
use App\Http\Requests\UpdateAlbumRequest;
use Illuminate\Http\Request;
use App\Models\Album;
use App\Models\Artist;
use App\Services\AlbumService;

class AlbumController extends Controller
{
    public function __construct(private AlbumService $albumService)
    {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::with('artist')->latest()->paginate(10);
        return view('albums.index' , compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $artists = Artist::orderBy('name')->get();
        return view('albums.create',
            [
                'artists' => $artists,
                'album' => new Album(),
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlbumRequest $request)
    {
        // Call Service
        $this->albumService->create($request->validated());

        return redirect()
                ->route('albums.index')
                ->with('sucess' , 'ALbum created Sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('albums.show' , compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Album $album)
    {
        $artists = Artist::orderBy('name')->get();
        return view('albums.edit' , [
            'album' => $album,
            'artists' => $artists
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlbumRequest $request, Album $album)
    {
        // Call Service
        $this->albumService->update($album,$request->validated());

        return redirect()
                ->route('albums.index')
                ->with('sucess' , 'Album Inserted Sucessfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Album $album)
    {
        // Call the Service
        $this->albumService->delete($album);
        
        return redirect()
        ->route('albums.index')
        ->with('sucess' , 'Album Deleted Sucessfully.');
    }
}
