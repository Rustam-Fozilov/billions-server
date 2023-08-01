<?php

namespace Database\Seeders;

use App\Models\Value;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ValueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => '364',
                'ru' => '364'
            ]
        ]);

        Value::create([
            'attribute_id' => 1,
            'name' => [
                'uz' => '360',
                'ru' => '360'
            ]
        ]);

        Value::create([
            'attribute_id' => 2,
            'name' => [
                'uz' => '2023',
                'ru' => '2023'
            ]
        ]);

        Value::create([
            'attribute_id' => 2,
            'name' => [
                'uz' => '2022',
                'ru' => '2022'
            ]
        ]);

        Value::create([
            'attribute_id' => 3,
            'name' => [
                'uz' => 'Qattiq',
                'ru' => 'Tverdiy'
            ]
        ]);

        Value::create([
            'attribute_id' => 3,
            'name' => [
                'uz' => 'Yumshoq',
                'ru' => 'Tverdiy'
            ]
        ]);

        Value::create([
            'attribute_id' => 4,
            'name' => [
                'uz' => 'English',
                'ru' => 'Английский'
            ]
        ]);

        Value::create([
            'attribute_id' => 4,
            'name' => [
                'uz' => 'Ruscha',
                'ru' => 'Русский'
            ]
        ]);

        Value::create([
            'attribute_id' => 4,
            'name' => [
                'uz' => 'O\'zbekcha',
                'ru' => 'Узбекский'
            ]
        ]);
    }
}
