<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Status::create([
            'name' => [
                'uz' => 'Yangi',
                'ru' => 'ru Yangi'
            ],
            'code' => 'new',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Tasdiqlandi',
                'ru' => 'ru Tasdiqlandi'
            ],
            'code' => 'confirmed',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yig\'ilmoqda',
                'ru' => 'ru Yig\'ilmoqda'
            ],
            'code' => 'processing',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yetkazib berilmoqda',
                'ru' => 'ru Yetkazib berilmoqda'
            ],
            'code' => 'shipping',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yetkazib berildi',
                'ru' => 'ru Yetkazib berildi'
            ],
            'code' => 'delivered',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Tugatildi',
                'ru' => 'ru Tugatildi'
            ],
            'code' => 'completed',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yopildi',
                'ru' => 'ru Yopildi'
            ],
            'code' => 'closed',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Bekor qilindi',
                'ru' => 'ru Bekor qilindi'
            ],
            'code' => 'canceled',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Qaytarib berildi',
                'ru' => 'ru Qaytarib berildi'
            ],
            'code' => 'refunded',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'To\'lov kutilyapti',
                'ru' => 'ru To\'lov kutilyapti'
            ],
            'code' => 'waiting_payment',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'To\'landi',
                'ru' => 'ru To\'landi'
            ],
            'code' => 'paid',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'To\'lovda xatolik',
                'ru' => 'ru To\'lovda xatolik'
            ],
            'code' => 'payment_error',
            'for' => 'order',
        ]);

    }
}
