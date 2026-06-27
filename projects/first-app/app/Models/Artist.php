<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Album;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Artist extends Model
{
    protected $fillable = [
        'name',
        'bio',
        'image'
    ];

    public function albums(): HasMany
    {
        return $this->hasMany(Album::class);
    }
}
