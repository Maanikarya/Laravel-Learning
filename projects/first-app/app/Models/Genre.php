<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Genre extends Model
{
    use HasFactory , SoftDeletes;

    protected $fillable = [
        'name'
    ];

    public function songs(): HasMany
    {
        return $this->hasMany(Song::class);
    }
}
