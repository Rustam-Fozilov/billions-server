<?php

namespace Database\Seeders;

use App\Models\Attribute;
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
        $attribute = Attribute::find(1);

        $attribute->values()->create([
            'name' => [
                'uz' => '364',
                'ru' => '364'
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => '360',
                'ru' => '360'
            ]
        ]);

        $attribute = Attribute::find(2);

        $attribute->values()->create([
            'name' => [
                'uz' => '2023',
                'ru' => '2023'
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => '2022',
                'ru' => '2022'
            ]
        ]);

        $attribute = Attribute::find(3);

        $attribute->values()->create([
            'name' => [
                'uz' => 'Qattiq',
                'ru' => 'Tverdiy'
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => 'Yumshoq',
                'ru' => 'Tverdiy'
            ]
        ]);

        $attribute = Attribute::find(4);

        $attribute->values()->create([
            'name' => [
                'uz' => 'English',
                'ru' => 'Английский'
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => 'Ruscha',
                'ru' => 'Русский'
            ]
        ]);

        $attribute->values()->create([
            'name' => [
                'uz' => 'O\'zbekcha',
                'ru' => 'Узбекский'
            ]
        ]);
    }
}
