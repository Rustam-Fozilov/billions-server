<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category = Category::create([
            'name' => [
                'uz' => 'Biznes',
                'ru' => 'Бизнес'
            ]
        ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Startuplar',
                        'ru' => 'Стартапы',
                    ]
                ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Menejment',
                        'ru' => 'Менеджмент',
                    ]
                ]);



        $category = Category::create([
            'name' => [
                'uz' => 'Marketing',
                'ru' => 'Маркетинг'
            ]
        ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Sotuvlar',
                        'ru' => 'Продажи',
                    ]
                ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Mijoz xizmatlari',
                        'ru' => 'Клиентский сервис',
                    ]
                ]);



        $category = Category::create([
            'name' => [
                'uz' => 'Psixologiya',
                'ru' => 'Психология'
            ]
        ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Oilaviy psixologiya',
                        'ru' => 'Семейная психология',
                    ]
                ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Munosabatlar',
                        'ru' => 'Отношения',
                    ]
                ]);

    }
}
