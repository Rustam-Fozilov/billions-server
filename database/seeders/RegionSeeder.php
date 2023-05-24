<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([
            "region_name" => "Dhaka"
        ]);

        Region::create([
            "region_name" => "Chittagong"
        ]);

        Region::create([
            "region_name" => "Rajshahi"
        ]);

        Region::create([
            "region_name" => "Khulna"
        ]);

        Region::create([
            "region_name" => "Barishal"
        ]);
    }
}
