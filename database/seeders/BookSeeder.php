<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $books = Book::factory(10)->create();

        foreach ($books as $book) {
            $book->currency_prices()->create([
                'currency_id' => 1,
                'price' => round(rand(10, 15), 2)
            ]);
            $book->currency_prices()->create([
                'currency_id' => 2,
                'price' => round(rand(120000, 150000), 2)
            ]);

            $book->images()->create([
                'link' => fake()->imageUrl,
                'quality' => 'high'
            ]);
            $book->images()->create([
                'link' => fake()->imageUrl,
                'quality' => 'medium'
            ]);
            $book->images()->create([
                'link' => fake()->imageUrl,
                'quality' => 'low'
            ]);


            $book->stocks()->create([
                'quantity' => rand(1, 10),
                'attributes' => json_encode([
                    [
                        'attribute_id' => 1,
                        'value_id' => rand(1, 2),
                    ],
                    [
                        'attribute_id' => 2,
                        'value_id' => rand(3, 4),
                    ],
                    [
                        'attribute_id' => 3,
                        'value_id' => rand(5, 6),
                    ],
                    [
                        'attribute_id' => 4,
                        'value_id' => rand(7, 9),
                    ]
                ])
            ]);
        }
    }
}
