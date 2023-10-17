<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use App\Models\VerifyCode;
use Illuminate\Http\JsonResponse;

class VerifyCodeService
{
    public function __construct(
        protected Controller $controller
    )
    {
    }


    public function create(int $user_id = null, int $code = null): VerifyCode
    {
        return VerifyCode::create([
            'user_id' => $user_id,
            'code' => $code
        ]);
    }


    public function verify($id, $code): JsonResponse
    {
        $verifyCode = VerifyCode::find($id);

        if ($verifyCode->code != $code) {
            return $this->controller->error('Verification code is incorrect');
        } else {
            $verifyCode->delete();
            $token = User::where('id', $verifyCode->user_id)->first()->createToken('auth_token')->plainTextToken;

            return $this->controller->success('User logged in successfully', [
                'token' => $token,
                'user' => new UserResource(User::where('id', $verifyCode->user_id)->first())
            ]);
        }
    }
}
