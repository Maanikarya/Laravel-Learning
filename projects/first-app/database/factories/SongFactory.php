<?php

namespace Database\Factories;

use App\Models\Song;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'title' => fake()->name(),
            // 'duration' => fake()->numberBetween(0,100),
            // 'audio_path' => fake()->url(),
            // 'cover_image' => fake()->imageUrl(600,300,'song'),
            // 'play_count' =>  fake()->numberBetween(0,100),
        ];
    }
}
