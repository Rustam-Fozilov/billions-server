<?php

namespace Database\Seeders;

use App\Models\DefaultSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DefaultSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DefaultSetting::create([
            'setting_id' => 1,
            'value_id' => 11,
            'switch' => null,
        ]);

        DefaultSetting::create([
            'setting_id' => 3,
            'value_id' => null,
            'switch' => false,
        ]);

        DefaultSetting::create([
            'setting_id' => 4,
            'value_id' => null,
            'switch' => true,
        ]);
    }
}
