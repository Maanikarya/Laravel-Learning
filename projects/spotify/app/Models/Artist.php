<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Album;
use App\Models\Song;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

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

    public function songs(): BelongsToMany
    {
        return $this->belongsToMany(Song::class);
    }
}
