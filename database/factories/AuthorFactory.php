<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => [
                'uz' => fake()->firstName,
                'ru' => 'ru ' . fake()->firstName
            ],
            'last_name' => [
                'uz' => fake()->lastName,
                'ru' => 'ru ' . fake()->lastName
            ],
            'description' => [
                'uz' => fake()->sentence(20),
                'ru' => 'ru: ' . fake()->sentence(20),
            ],
            'photo' => fake()->imageUrl
        ];
    }
}
