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


    public function sendVerificationCode($mobile_phone): int
    {
        $smsCode = rand(10000, 99999);

        Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->getToken()
        ])->post(env('SMS_API_URL') . '/message/sms/send', [
            'mobile_phone' => $mobile_phone,
            'message' => 'Your code: ' . $smsCode,
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
