<?php

namespace Database\Seeders;

use App\Models\Attribute;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AttributeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Attribute::create(['name' => 'number of pages']);
        Attribute::create(['name' => 'year']);
        Attribute::create(['name' => 'cover type']);
        Attribute::create(['name' => 'language']);
    }
}
