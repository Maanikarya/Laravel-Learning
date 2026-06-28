<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artist;

class ArtistController extends Controller
{
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
        return view('artists.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'bio' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        Artist::create([
            'name' => $request->input('name'),
            'bio' => $request->input('bio'),
        ]);

        return redirect()
        ->route('artists.index')
        ->with('sucess' , "Artist Created Successfully!!");
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
    public function edit(Artist $artist)
    {
        return view('artists.edit' , [ 'artist' => $artist ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Artist $artist)
    {
        $request->validate([
            'name' => 'required|max:255',
            'bio' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $artist->update([
            'name' => $request->name,
            'bio' => $request->bio,
        ]);
        
        return redirect()
        ->route('artists.index')
        ->with('sucess' , 'Artist Updated sucessfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
