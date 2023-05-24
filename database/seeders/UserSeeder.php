<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'full_name' => 'John Doe',
            'phone_number' => '1234567890',
            'region_id' => 1,
            'address_1' => '123 Main St',
            'address_2' => 'Apt 1',
        ]);

        User::create([
            'full_name' => 'Jane Doe',
            'phone_number' => '1234567890',
            'region_id' => 2,
            'address_1' => '123 Main St',
            'address_2' => 'Apt 1',
        ]);

        User::create([
            'full_name' => 'John Smith',
            'phone_number' => '1234567890',
            'region_id' => 3,
            'address_1' => '123 Main St',
            'address_2' => 'Apt 1',
        ]);
    }
}
