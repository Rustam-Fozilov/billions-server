<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'category_name' => 'Novel',
        ]);

        Category::create([
            'category_name' => 'Fiction',
        ]);

        Category::create([
            'category_name' => 'Non-Fiction',
        ]);

        Category::create([
            'category_name' => 'Fantasy',
        ]);

        Category::create([
            'category_name' => 'Romance',
        ]);

        Category::create([
            'category_name' => 'Thriller',
        ]);
    }
}
