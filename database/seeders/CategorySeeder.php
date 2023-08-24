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
            ]
        ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'O\'z-o\'ziga ishonch',
                        'ru' => 'Уверенность в себе',
                    ]
                ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Vaqtni boshqarish',
                        'ru' => 'Тайм-менеджмент',
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
                        'uz' => 'o\'z-o\'zini anglash',
                        'ru' => 'Самопознание',
                    ]
                ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Bolalar psixologiyasi',
                        'ru' => 'Детская психология',
                    ]
                ]);



        $category = Category::create([
            'name' => [
                'uz' => 'Biznes',
                'ru' => 'Бизнес'
            ]
        ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Menejment',
                        'ru' => 'Менеджмент',
                    ]
                ]);
                $category->child_categories()->create([
                    'name' => [
                        'uz' => 'Startuplar',
                        'ru' => 'Стартапы',
                    ]
                ]);



        Category::create([
            'name' => [
                'uz' => 'Moliya',
                'ru' => 'Финансы'
            ]
        ]);

        Category::create([
            'name' => [
                'uz' => 'Bolalar va ota-onalar uchun',
                'ru' => 'Для детей и родителей'
            ]
        ]);

        Category::create([
            'name' => [
                'uz' => 'Marketing va sotuvlar',
                'ru' => 'Маркетинг и продажи'
            ]
        ]);

        Category::create([
            'name' => [
                'uz' => 'Iqtisodiyot va siyosat',
                'ru' => 'Экономика и политика'
            ]
        ]);

        Category::create([
            'name' => [
                'uz' => 'Sog\'lom hayot tarzi',
                'ru' => 'Здоровый образ жизни'
            ]
        ]);

        Category::create([
            'name' => [
                'uz' => 'San\'at va ijod',
                'ru' => 'Искусство и творчество'
            ]
        ]);
    }
}
