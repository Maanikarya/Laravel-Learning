<?php

namespace App\Services;

use App\Models\Album;
use Illuminate\Support\Facades\Storage;

class AlbumService{

    public function create(array $data)
    {
        if( isset($data['cover_image']) ){
            // Store the Image in DB
            $data['cover_image'] = $data['cover_image']->store('album' , 'public');
        }

        return Album::create($data);
    }

    public function update(Album $album , array $data){

        if( isset($data['cover_image']) ){
            if( isset( $album->cover_image ) ){
                Storage::disk('public')->delete($album->cover_image);
            }
            // Store the Image in DB
            $data['cover_image'] = $data['cover_image']->store('album' , 'public');
        }

        $album->update($data);
        return $album;
    }

    public function delete(Album $album){

        if( $album->cover_image ){
            Storage::disk('public')->delete($album->cover_image);
        }

        $album->delete();
        return $album;
    }
}