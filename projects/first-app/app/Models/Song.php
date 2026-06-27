<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Playlist;

class Song extends Model
{
    protected $fillable = [
        'artist_id',
        'album_id',
        'genre_id',
        'title',
        'duration',
        'audio_path',
        'cover_image',
        'play_count',
    ];

    public function album():  BelongsTo
    {
        return $this->belongsTo(Album::class);
    }

    public function artist():  BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function genre():  BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class);
    }

}
