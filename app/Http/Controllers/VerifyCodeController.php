<?php

namespace App\Http\Controllers;

use App\Http\Requests\VerifyCodeRequest;
use App\Services\VerifyCodeService;
use Illuminate\Http\JsonResponse;

class VerifyCodeController extends Controller
{
    public function __construct(
        protected VerifyCodeService $verifyCodeService
    )
    {
    }


    public function verifySMSCode(VerifyCodeRequest $request): JsonResponse
    {
        return $this->verifyCodeService->verify($request->id, $request->code);
    }
}
