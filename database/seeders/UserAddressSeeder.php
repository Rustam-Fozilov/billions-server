<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserAddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::find(2)->addresses()->create([
            'address_name' => 'My home',
            "latitude" => "latitude 2",
            "longitude" => "longitude 2",
            "region" => "Tashkent city 2",
            "street" => "Diydor 2",
            "district" => "Chilonzor 2",
            "house" => "252"
        ]);
    }
}
