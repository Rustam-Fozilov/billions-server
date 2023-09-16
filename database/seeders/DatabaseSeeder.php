<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Currency;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            CategorySeeder::class,
            RoleSeeder::class,
            AuthorSeeder::class,
            AttributeSeeder::class,
            ValueSeeder::class,
            CurrencySeeder::class,
            BookSeeder::class,
            UserSeeder::class,
            DeliveryMethodSeeder::class,
            PaymentTypeSeeder::class,
            UserAddressSeeder::class,
            StatusSeeder::class,
            SettingSeeder::class,
            GuestSettingSeeder::class,
            CartSeeder::class,
        ]);
    }
}
