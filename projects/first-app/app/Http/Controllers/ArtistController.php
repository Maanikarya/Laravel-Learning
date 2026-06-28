<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreArtistRequest;
use App\Http\Requests\UpdateArtistRequest;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Services\ArtistService;

class ArtistController extends Controller
{

    public function __construct(private ArtistService $artistService)
    {

    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $artists = Artist::latest()->paginate(10);
        return view('artists.index' , compact('artists'));
        // return view('artists.index' , [
        //     'artists' => $artists
        // ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // return view('artists.create');
        return view('artists.create' , ['artist' => new Artist()]); // Safe when we use same view for create and edit form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreArtistRequest $request)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'bio' => 'required',
            
        // ]);
        // Artist::create([
        //     'name' => $request->input('name'),
        //     'bio' => $request->input('bio'),
        // ]);

        // Artist::create([
        //     $request->validated()
        // ]);

        $this->artistService->create($request->validated());

        return redirect()
        ->route('artists.index')
        ->with('sucess' , "Artist Created Successfully!!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Artist $artist)
    {
        return view('artists.show' , compact('artist'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Artist $artist)
    {
        return view('artists.edit' , [ 'artist' => $artist ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateArtistRequest $request, Artist $artist)
    {
        // $request->validate([
        //     'name' => 'required|max:255',
        //     'bio' => 'required',
        //     'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        // ]);


        // $artist->update([
        //     'name' => $request->name,
        //     'bio' => $request->bio,
        // ]);
        
        $this->artistService->update($artist , $request->validated());

        return redirect()
        ->route('artists.index')
        ->with('sucess' , 'Artist Updated sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Artist $artist)
    {
        // $artist->delete();

        $this->artistService->delete($artist);

        return redirect()
        ->route('artists.index')
        ->with('success' , 'Artist Delete Successfully!');
    }
}
