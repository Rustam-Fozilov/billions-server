<?php

namespace Database\Seeders;

use App\Models\GuestSetting;
use Illuminate\Database\Seeder;

class GuestSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuestSetting::create([
            'setting_id' => 1,
            'value_id' => 11,
            'switch' => null,
        ]);

        GuestSetting::create([
            'setting_id' => 3,
            'value_id' => null,
            'switch' => false,
        ]);

        GuestSetting::create([
            'setting_id' => 4,
            'value_id' => null,
            'switch' => true,
        ]);
    }
}
