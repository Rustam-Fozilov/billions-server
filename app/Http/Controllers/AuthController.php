<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Services\AuthService;
use App\Services\SMSService;
use App\Services\UserService;
use App\Services\VerifyCodeService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\PersonalAccessToken;
use function PHPUnit\Framework\isEmpty;

class AuthController extends Controller
{
    public function __construct(
        protected SMSService $smsService,
        protected VerifyCodeService $verifyCodeService,
        protected UserService $userService,
        protected AuthService $authService
    )
    {
        $this->middleware('auth:sanctum')->except(['sendSMSCode', 'refreshToken']);
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
        return $this->success(
            'Logged out successfully',
            auth()->user()->tokens()->delete()
        );
    }


    public function refreshToken(Request $request): JsonResponse
    {
        return $this->authService->refreshToken($request->phone, $request->token);
    }
}
