<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Services\SMSService;
use App\Services\UserService;
use App\Services\VerifyCodeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(
        protected SMSService $smsService,
        protected VerifyCodeService $verifyCodeService,
        protected UserService $userService
    )
    {
        $this->middleware('auth:sanctum')->except(['sendSMSCode']);
    }


    public function sendSMSCode(LoginRequest $request): JsonResponse
    {
        $user = $this->userService->findOrCreate(phone: $request->phone);
        $code = $this->smsService->sendVerificationCode($request->phone, $request->lang);
        $code_id = $this->verifyCodeService->create($user->id, $code);

        return $this->success('Verification code sent successfully', [
            'id' => $code_id->id,
            'code' => $code
        ]);
    }


    public function user(Request $request): JsonResponse
    {
        return $this->response(
            new UserResource($request->user())
        );
    }


    public function logout(): JsonResponse
    {
        return $this->response(
            auth()->user()->currentAccessToken()->delete()
        );
    }
}
