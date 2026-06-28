<?php

namespace App\Services;

use App\Models\Artist;
use Illuminate\Support\Facades\Storage;

class ArtistService{

    public function create(array $data)
    {
        if( $data['image'] ){
            // Store the Image in the DB
            $data['image'] = $data['image']->store('artist' , 'public');
        }

        $artist = Artist::create($data);
        return $artist;
    }

    public function update(Artist $artist, array $data)
    {
        if( $data['image'] ){
            
            if($artist->image){
                Storage::disk('public')->delete($artist->image);
            }

            // Store the Image in the DB
            $data['image'] = $data['image']->store('artist' , 'public');
        }
        $artist->update($data);
        return $artist;
    }

    public function delete(Artist $artist)
    {
        if($artist->image){
            Storage::disk('public')->delete($artist->image);
        }
        $artist->delete();
        return $artist;
    }

}
