<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentTypeResource;
use App\Models\PaymentType;
use App\Http\Requests\StorePaymentTypeRequest;
use App\Http\Requests\UpdatePaymentTypeRequest;
use Illuminate\Http\JsonResponse;

class PaymentTypeController extends Controller
{

    public function index(): JsonResponse
    {
        return response()->json(
            PaymentTypeResource::collection(PaymentType::all())
        );
    }


    public function create()
    {
        //
    }


    public function store(StorePaymentTypeRequest $request)
    {
        //
    }


    public function show(PaymentType $paymentType)
    {
        //
    }


    public function edit(PaymentType $paymentType)
    {
        //
    }


    public function update(UpdatePaymentTypeRequest $request, PaymentType $paymentType)
    {
        //
    }


    public function destroy(PaymentType $paymentType)
    {
        //
    }
}
