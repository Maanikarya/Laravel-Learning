<?php

namespace App\Services;

use App\Models\Playlist;
use Illuminate\Support\Facades\Storage;


class PlaylistService{

    public function create(array $data)
    {
        $playlist = Playlist::create($data);
        $playlist->songs()->sync($data['songs']);
        return $playlist;
    }

    public function update( Playlist $playlist , array $data)
    {
        $playlist->update($data);
        $playlist->songs()->sync($data['songs']);
        return $playlist;
    }

    public function delete( Playlist $playlist )
    {
        $playlist->delete();
        return $playlist;
    }

}
