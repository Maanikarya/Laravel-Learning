<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Song;

class Genre extends Model
{
    protected $fillable = [
        'name'
    ];

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }
}
