<?php

namespace App\Services;


use Illuminate\Support\Facades\Storage;
use App\Models\Song;

class SongService{

    public function create(array $data)
    {
        if( isset($data['cover_image']) )
        {
            $data['cover_image'] = $data['cover_image']->store('song' , 'public');
        }

        if( isset($data['audio_path']) )
        {
           $data['audio_path'] = $data['audio_path']->store('song_audio' , 'public');
        }
        return Song::create($data);
    }

    public function update(Song $song,array $data)
    {
        if( isset($data['cover_image']) )
        {
            if( $song->cover_image ){
                Storage::disk('public')->delete($song->cover_image);
            }

            $data['cover_image'] = $data['cover_image']->store('song' , 'public');
        }

        if( isset($data['audio_path']) )
        {
            if( $song->audio_path ){
                Storage::disk('public')->delete($song->audio_path);
            }
            
           $data['audio_path'] = $data['audio_path']->store('song_audio' , 'public');
        }

        $song->update($data);
        return $song;
    }

    public function delete(Song $song)
    {

        if( $song->cover_image ){
            Storage::disk('public')->delete($song->cover_image);
        }

        if( $song->audio_path ){
            Storage::disk('public')->delete($song->audio_path);
        }

        $song->delete();
        return $song;
    }

}
