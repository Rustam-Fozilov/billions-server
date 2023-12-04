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
                'uz' => 'Shaxsiy rivojlanish',
                'ru' => 'Саморазвитие'
            ],
            'path_name' => 'personal-development'
        ]);
        $category->image()->create([
            'link' => 'personal-development.png'
        ]);
                $sub = $category->child_categories()->create([
                    'name' => [
                        'uz' => 'O\'z-o\'ziga ishonch',
                        'ru' => 'Уверенность в себе',
                    ],
                    'path_name' => 'self-confidence'
                ]);
                $sub->image()->create([
                    'link' => 'self-confidence.png'
                ]);
                $sub = $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Vaqtni boshqarish',
                        'ru' => 'Тайм-менеджмент',
                    ],
                    'path_name' => 'time-management'
                ]);
                $sub->image()->create([
                    'link' => 'time-management.png'
                ]);



        $category = Category::create([
            'name' => [
                'uz' => 'Psixologiya',
                'ru' => 'Психология'
            ],
            'path_name' => 'psychology'
        ]);
        $category->image()->create([
            'link' => 'psychology.png'
        ]);
                $sub = $category->child_categories()->create([
                    'name' => [
                        'uz' => 'o\'z-o\'zini anglash',
                        'ru' => 'Самопознание',
                    ],
                    'path_name' => 'self-knowledge'
                ]);
                $sub->image()->create([
                    'link' => 'self-knowledge.png'
                ]);
                $sub = $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Bolalar psixologiyasi',
                        'ru' => 'Детская психология',
                    ],
                    'path_name' => 'child-psychology'
                ]);
                $sub->image()->create([
                    'link' => 'child-psychology.png'
                ]);



        $category = Category::create([
            'name' => [
                'uz' => 'Biznes',
                'ru' => 'Бизнес'
            ],
            'path_name' => 'business'
        ]);
        $category->image()->create([
            'link' => 'business.png'
        ]);
                $sub = $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Menejment',
                        'ru' => 'Менеджмент',
                    ],
                    'path_name' => 'management'
                ]);
                $sub->image()->create([
                    'link' => 'management.png'
                ]);
                $sub = $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Startuplar',
                        'ru' => 'Стартапы',
                    ],
                    'path_name' => 'startups'
                ]);
                $sub->image()->create([
                    'link' => 'startups.png'
                ]);



        $category = Category::create([
            'name' => [
                'uz' => 'Moliya',
                'ru' => 'Финансы'
            ],
            'path_name' => 'finance'
        ]);
        $category->image()->create([
            'link' => 'finance.png'
        ]);

        $category = Category::create([
            'name' => [
                'uz' => 'Bolalar va ota-onalar uchun',
                'ru' => 'Для детей и родителей'
            ],
            'path_name' => 'for-children-and-parents'
        ]);
        $category->image()->create([
            'link' => 'for-children-and-parents.png'
        ]);

        $category = Category::create([
            'name' => [
                'uz' => 'Marketing va sotuvlar',
                'ru' => 'Маркетинг и продажи'
            ],
            'path_name' => 'marketing-and-sales'
        ]);
        $category->image()->create([
            'link' => 'marketing-and-sales.png'
        ]);

        $category = Category::create([
            'name' => [
                'uz' => 'Iqtisodiyot va siyosat',
                'ru' => 'Экономика и политика'
            ],
            'path_name' => 'economics-and-politics'
        ]);
        $category->image()->create([
            'link' => 'economics-and-politics.png'
        ]);
    }
}
