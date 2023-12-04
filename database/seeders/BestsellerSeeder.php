<?php

namespace Database\Seeders;

use App\Models\Bestseller;
use Illuminate\Database\Seeder;

class BestsellerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 1; $i <= 10; $i++) {
            Bestseller::create([
                'book_id' => $i
            ]);
        }
    }
}
