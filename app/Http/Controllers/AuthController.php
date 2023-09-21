<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\SMSService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function __construct(
        protected SMSService $smsService,
    )
    {
    }


    public function login(LoginRequest $request): JsonResponse
    {
        $user = User::where('phone', $request->phone)->first();


        if (!$user) {
            User::create([
                'phone' => $request->phone,
            ]);
        }


        $code = $this->smsService->sendVerificationCode($request->phone);
        return $this->success('Verification code sent successfully', [
            'code' => $code
        ]);
    }


    public function verifyCode(Request $request)
    {
        $request->validate([
            'code' => 'required'
        ]);
    }


    public function user(Request $request): JsonResponse
    {
        return $this->response(
            new UserResource($request->user())
        );
    }
}
