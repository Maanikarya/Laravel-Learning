<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artist extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'name',
        'bio',
        'image'
    ];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image
                ? asset('storage/' . $this->image)
                : asset('storage/default_profile.jpg');
    }
}
