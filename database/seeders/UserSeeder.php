<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'first_name' => 'Admin',
            'last_name' => 'Admin',
            'phone' => '+9999999',
            'email' => 'admin@billions.uz',
            'password' => Hash::make('secret'),
        ]);
        $admin->roles()->attach(1);

        $user = User::create([
            'first_name' => 'Rustam',
            'last_name' => 'Fozilov',
            'phone' => '+998977672097',
            'email' => 'rustam@gmail.uz',
            'password' => Hash::make('secret'),
        ]);
        $user->roles()->attach(4);

        $users = User::factory(10)->hasAttached([Role::find(4)])->create();
        foreach ($users as $user) {
            $user->favorites()->attach(rand(1, 10));
        }
    }
}
