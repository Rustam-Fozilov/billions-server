<?php

namespace Database\Seeders;

use App\Enums\SettingType;
use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $setting = Setting::create([
            'name' => [
                'uz' => 'Til',
                'ru' => 'Язык'
            ],
            'type' => SettingType::SELECT->value,
        ]);
        $setting->values()->create([
           'name' => [
               'uz' => 'O\'zbekcha',
               'ru' => 'na uzbekskom'
           ],
            'details' => json_encode([
                'code' => 'uz',
                'icon' => 'uzb-flag.png'
            ])
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'Ruscha',
                'ru' => 'na russkom'
            ],
            'details' => json_encode([
                'code' => 'ru',
                'icon' => 'russia-flag.png'
            ])
        ]);



        $setting = Setting::create([
            'name' => [
                'uz' => 'Pul birligi',
                'ru' => 'rus Pul birligi'
            ],
            'type' => SettingType::SELECT->value,
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'So\'m',
                'ru' => 'rus So\'m'
            ]
        ]);
        $setting->values()->create([
            'name' => [
                'uz' => 'Dollar',
                'ru' => 'rus Dollar'
            ]
        ]);



        $setting = Setting::create([
            'name' => [
                'uz' => 'Dark mode',
                'ru' => 'rus Dark mode'
            ],
            'type' => SettingType::SWITCH->value,
        ]);

        $setting = Setting::create([
            'name' => [
                'uz' => 'Xabarnomalar',
                'ru' => 'rus Xabarnomalar'
            ],
            'type' => SettingType::SWITCH->value,
        ]);
    }
}
