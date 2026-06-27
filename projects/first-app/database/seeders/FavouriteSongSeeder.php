<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Song;

class FavouriteSongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user){
            $songIds = Song::query()
            ->inRandomOrder()
            ->limit(fake()->numberBetween(5, 20))
            ->pluck('id');

            $user->favoriteSongs()
                ->syncWithoutDetaching($songIds);

        });
    }
}
