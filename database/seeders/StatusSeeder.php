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
                'ru' => 'Новый'
            ],
            'code' => 'new',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Tasdiqlandi',
                'ru' => 'Подтверждено'
            ],
            'code' => 'confirmed',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yig\'ilmoqda',
                'ru' => 'Собирается'
            ],
            'code' => 'processing',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yetkazib berilmoqda',
                'ru' => 'Доставляется'
            ],
            'code' => 'shipping',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yetkazib berildi',
                'ru' => 'Доставлено'
            ],
            'code' => 'delivered',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Tugatildi',
                'ru' => 'Завершено'
            ],
            'code' => 'completed',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Yopildi',
                'ru' => 'Закрыто'
            ],
            'code' => 'closed',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Bekor qilindi',
                'ru' => 'Отменено'
            ],
            'code' => 'canceled',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'Qaytarib berildi',
                'ru' => 'Возвращено'
            ],
            'code' => 'refunded',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'To\'lov kutilyapti',
                'ru' => 'Ожидание оплаты'
            ],
            'code' => 'waiting_payment',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'To\'landi',
                'ru' => 'Оплачено'
            ],
            'code' => 'paid',
            'for' => 'order',
        ]);

        Status::create([
            'name' => [
                'uz' => 'To\'lovda xatolik',
                'ru' => 'Ошибка при оплате'
            ],
            'code' => 'payment_error',
            'for' => 'order',
        ]);

    }
}
