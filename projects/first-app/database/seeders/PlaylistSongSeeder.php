<?php

namespace Database\Seeders;

use App\Models\Playlist;
use App\Models\Song;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlaylistSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Playlist::all()->each(function (Playlist $playlist){
             $songIds = Song::query()
                ->inRandomOrder()
                ->limit(fake()->numberBetween(10, 40))
                ->pluck('id');

             $playlist->songs()->syncWithoutDetaching($songIds);
        });

    }
}
