<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Album;
use App\Models\Genre;


class SongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genreIds = Genre::pluck('id');

        Album::all()->each(function (Album $album) use ($genreIds){
            $album->songs()->createMany([
                [
                    'artist_id' => $album->artist_id,
                    'genre_id' => $genreIds->random(),
                    'title'       => fake()->sentence(3),
                    'duration'    => fake()->numberBetween(120, 360),
                    'audio_path'  => 'songs/demo.mp3',
                    'cover_image' => fake()->imageUrl(),
                    'play_count'  => fake()->numberBetween(0, 100000),
                ],
                [
                    'artist_id'   => $album->artist_id,
                    'genre_id'    => $genreIds->random(),
                    'title'       => fake()->sentence(3),
                    'duration'    => fake()->numberBetween(120, 360),
                    'audio_path'  => 'songs/demo.mp3',
                    'cover_image' => fake()->imageUrl(),
                    'play_count'  => fake()->numberBetween(0, 100000),
                ]
            ]);
        });
    }
}
