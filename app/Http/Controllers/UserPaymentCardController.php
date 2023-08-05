<?php

namespace App\Http\Controllers;

use App\Models\UserPaymentCard;
use App\Http\Requests\StoreUserPaymentCardRequest;
use App\Http\Requests\UpdateUserPaymentCardRequest;
use Illuminate\Http\JsonResponse;

class UserPaymentCardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        return response()->json(
            auth()->user()->paymentCards
        );
    }


    public function store(StoreUserPaymentCardRequest $request)
    {
        //
    }


    public function show(UserPaymentCard $userPaymentCard)
    {
        //
    }


    public function update(UpdateUserPaymentCardRequest $request, UserPaymentCard $userPaymentCard)
    {
        //
    }


    public function destroy(UserPaymentCard $userPaymentCard)
    {
        //
    }
}
