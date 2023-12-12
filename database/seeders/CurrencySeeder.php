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
                'ru' => 'доллар'
            ],
            'symbol' => '$',
        ]);

        Currency::create([
            'name' => [
                'uz' => 'so\'m',
                'ru' => 'сум',
            ],
        ]);

        Currency::create([
            'name' => [
                'uz' => 'rubl',
                'ru' => 'рубль'
            ],
            'symbol' => '₽'
        ]);
    }
}
