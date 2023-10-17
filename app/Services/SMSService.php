<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use GuzzleHttp\Promise\PromiseInterface;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class SMSService
{
    public function __construct(
        protected Controller $controller
    )
    {
    }

    public function getToken()
    {
        return Http::post(env('SMS_API_URL') . '/auth/login', [
            'email' => env('SMS_API_EMAIL'),
            'password' => env('SMS_API_SECRET_KEY')
        ])->object()->data->token;
    }


    public function sendVerificationCode($mobile_phone, $lang): int
    {
        $smsCode = rand(10000, 99999);
        $message_uz = 'Billionsga xush kelibsiz.' . PHP_EOL . 'Tasdiqlash kodingiz: ' . $smsCode . PHP_EOL . 'Iltimos, bu kodni hech kimga bermang. Bizni tanlaganingiz uchun rahmat!';
        $message_ru = 'Добро пожаловать в Billions.' . PHP_EOL . 'Ваш код подтверждения: ' . $smsCode . PHP_EOL. 'Пожалуйста, не передавайте этот код никому. Спасибо, что выбрали нас!';

        Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->post(env('SMS_API_URL') . '/message/sms/send', [
            'mobile_phone' => $mobile_phone,
            'message' => $lang === 'uz' ? $message_uz : $message_ru,
            'from' => '4546'
        ]);

        return $smsCode;
    }


    public function getAllContacts(string $token)
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->get(env('SMS_API_URL') . '/contact')->object()->data;
    }


    public function addNewContact($mobile_phone, $token): PromiseInterface|Response
    {
        return Http::withHeaders([
            'Authorization' => 'Bearer ' . $token
        ])->post(env('SMS_API_URL') . '/contact', [
            'name' => 'null',
            'mobile_phone' => $mobile_phone,
            'email' => 'null@app.com',
            'group' => 1
        ]);
    }
}
