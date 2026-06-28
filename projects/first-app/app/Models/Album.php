<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Override;
use App\Models\Artist;
use App\Models\Song;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'title',
        'cover_image',
        'release_date',
        'artist_id',
    ];

    protected $casts = [
        'release_date' => 'date',
    ];
    

    public function artist(): BelongsTo
    {
        return $this->belongsTo(Artist::class);
    }

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }

    public function getCoverImageUrlAttribute()
    {
        return $this->cover_image
                ? asset('storage/' . $this->cover_image)
                : asset('storage/default_profile.jpg');
    }

}
