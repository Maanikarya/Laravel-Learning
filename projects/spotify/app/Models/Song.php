<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Song extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
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

    public function genre():  BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }

    public function artist():  BelongsToMany
    {
        return $this->belongsToMany(Artist::class);
    }

    public function playlists(): BelongsToMany
    {
        return $this->belongsToMany(Playlist::class);
    }

    public function favoritedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'favorites_song',
            'song_id',
            'user_id'
        )->withTimestamps();
    }

    public function getCoverImageUrlAttribute(){
        return $this->cover_image
        ? asset('storage/' . $this->cover_image )
        : asset('storage/default_profile.jpg');
    }

    public function getAudioPathUrlAttribute(){
        return $this->audio_path
        ? asset('storage/' . $this->audio_path )
        : asset('');
    }
}
