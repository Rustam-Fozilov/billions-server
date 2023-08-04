<?php

namespace Database\Seeders;

use App\Models\DeliveryMethod;
use Illuminate\Database\Seeder;

class DeliveryMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DeliveryMethod::create([
            'name' => [
                'uz' => 'Tekin',
                'ru' => 'Бесплатно',
            ],
            'estimated_time' => 30,
            'sum' => 100,
        ]);

        DeliveryMethod::create([
            'name' => [
                'uz' => 'O\'zim olib ketaman',
                'ru' => 'Самовывоз',
            ],
            'estimated_time' => [
                'uz' => '30 daqiqa',
                'ru' => '30 минут',
            ],
            'sum' => 0,
        ]);

        DeliveryMethod::create([
            'name' => [
                'uz' => 'Kuryer bilan yetkazib berish',
                'ru' => 'Доставка курьером',
            ],
            'estimated_time' => [
                'uz' => '45 daqiqa',
                'ru' => '45 минут',
            ],
            'sum' => 200,
        ]);
    }
}
