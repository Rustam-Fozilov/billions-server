<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Laravel\Sanctum\PersonalAccessToken;

class AuthService
{
    public function __construct(
        protected UserService $userService,
        protected Controller $controller
    )
    {
    }

    public function refreshToken($phone, $token): JsonResponse
    {
        $user = $this->userService->find('phone', $phone);
        $recentToken = PersonalAccessToken::findToken($token);

        if (!is_null($recentToken)) {
            return $this->controller->response(
                ['token' => $token]
            );
        }

        if (is_null($user)) {
            return $this->controller->error('User not found');
        }

        $user->tokens()->delete();
        $token = $user->createToken('token')->plainTextToken;

        return $this->controller->response(
            ['token' => $token]
        );
    }
}
