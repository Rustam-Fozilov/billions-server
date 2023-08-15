<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'category_id' => rand(1, 3),
            'author_id' => rand(1, 10),
            'name' => [
                'uz' => fake()->sentence(3),
                'ru' => 'Это русский: ' . fake()->sentence(3)
            ],
            'description' => [
                'uz' => fake()->paragraph(10),
                'ru' => 'Это русский: ' . fake()->paragraph(10)
            ],
        ];
    }
}
