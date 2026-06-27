<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlaylistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::all()->each(function (User $user){
            $user->playlists()->createMany([
                [
                    'name' => fake()->words(3, true),
                    'description' => fake()->paragraph()
                ],
                [
                    'name' => fake()->words(3, true),
                    'description' => fake()->paragraph()
                ],
            ]);
        });
    }
}
