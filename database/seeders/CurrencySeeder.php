<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Currency::create([
            'name' => [
                'uz' => 'dollar',
                'ru' => 'ru dollar'
            ],
            'symbol' => '$',
        ]);

        Currency::create([
            'name' => [
                'uz' => 'so\'m',
                'ru' => 'sum',
            ],
        ]);

        Currency::create([
            'name' => [
                'uz' => 'rubil',
                'ru' => 'rubl'
            ],
            'symbol' => '₽'
        ]);
    }
}
