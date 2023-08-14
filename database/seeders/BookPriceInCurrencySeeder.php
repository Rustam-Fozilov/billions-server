<?php

namespace Database\Seeders;

use App\Models\BookPriceInCurrency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookPriceInCurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BookPriceInCurrency::create([
            'book_id' => rand(1, 30),
            'name' => 'dollar',
            'price' => 10.5,
            'symbol' => '$'
        ]);

        BookPriceInCurrency::create([
            'book_id' => rand(1, 30),
            'name' => 'dollar',
            'price' => 10.5,
            'symbol' => '$'
        ]);
    }
}
