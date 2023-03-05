<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'url' => fake()->imageUrl(400, 300),
            'imageable_id' => fake()->numberBetween(1, 50),
            'imageable_type' => 'App\Models\Post',
        ];
    }
}
