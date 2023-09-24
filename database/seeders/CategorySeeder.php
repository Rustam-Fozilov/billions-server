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
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'O\'z-o\'ziga ishonch',
                        'ru' => 'Уверенность в себе',
                    ],
                    'path_name' => 'self-confidence'
                ]);
                $subCategory = $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Vaqtni boshqarish',
                        'ru' => 'Тайм-менеджмент',
                    ],
                    'path_name' => 'time-management'
                ]);
                        $subCategory->child_categories()->create([
                            'name' => [
                                'uz' => 'Vaqtni boshqarish subcategory',
                                'ru' => 'Тайм-менеджмент subcategory',
                            ],
                            'path_name' => 'time-management-subcategory'
                        ]);



        $category = Category::create([
            'name' => [
                'uz' => 'Psixologiya',
                'ru' => 'Психология'
            ],
            'path_name' => 'psychology'
        ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'o\'z-o\'zini anglash',
                        'ru' => 'Самопознание',
                    ],
                    'path_name' => 'self-knowledge'
                ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Bolalar psixologiyasi',
                        'ru' => 'Детская психология',
                    ],
                    'path_name' => 'child-psychology'
                ]);



        $category = Category::create([
            'name' => [
                'uz' => 'Biznes',
                'ru' => 'Бизнес'
            ],
            'path_name' => 'business'
        ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Menejment',
                        'ru' => 'Менеджмент',
                    ],
                    'path_name' => 'management'
                ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Startuplar',
                        'ru' => 'Стартапы',
                    ],
                    'path_name' => 'startups'
                ]);



        Category::create([
            'name' => [
                'uz' => 'Moliya',
                'ru' => 'Финансы'
            ],
            'path_name' => 'finance'
        ]);

        Category::create([
            'name' => [
                'uz' => 'Bolalar va ota-onalar uchun',
                'ru' => 'Для детей и родителей'
            ],
            'path_name' => 'for-children-and-parents'
        ]);

        Category::create([
            'name' => [
                'uz' => 'Marketing va sotuvlar',
                'ru' => 'Маркетинг и продажи'
            ],
            'path_name' => 'marketing-and-sales'
        ]);

        Category::create([
            'name' => [
                'uz' => 'Iqtisodiyot va siyosat',
                'ru' => 'Экономика и политика'
            ],
            'path_name' => 'economics-and-politics'
        ]);

        Category::create([
            'name' => [
                'uz' => 'Sog\'lom hayot tarzi',
                'ru' => 'Здоровый образ жизни'
            ],
            'path_name' => 'healthy-lifestyle'
        ]);

        Category::create([
            'name' => [
                'uz' => 'San\'at va ijod',
                'ru' => 'Искусство и творчество'
            ],
            'path_name' => 'art-and-creativity'
        ]);
    }
}
