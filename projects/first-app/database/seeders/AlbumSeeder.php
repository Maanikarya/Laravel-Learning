<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artist::all()->each(function (Artist $artist){
            $artist->albums()->createMany([
                [
                    'title' => fake()->sentence(2),
                    'cover_image' => fake()->imageUrl(),
                    'release_date' => fake()->date(),
                ],
                                [
                    'title' => fake()->sentence(2),
                    'cover_image' => fake()->imageUrl(),
                    'release_date' => fake()->date(),
                ]
            ]);
        });
    }
}
