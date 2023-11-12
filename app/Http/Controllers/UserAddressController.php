<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserAddressResource;
use App\Models\UserAddress;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;
use Illuminate\Http\JsonResponse;

class UserAddressController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function index(): JsonResponse
    {
        return $this->response(
            UserAddressResource::collection(auth()->user()->addresses)
        );
    }


    public function store(StoreUserAddressRequest $request): JsonResponse
    {
        $address = auth()->user()->addresses()->create($request->toArray());

        return $this->success('shipping address created', $address);
    }


    public function show(UserAddress $userAddress)
    {
        //
    }


    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress): JsonResponse
    {
        $userAddress->update($request->toArray());

        return $this->success('shipping address updated', $userAddress);
    }


    public function destroy(UserAddress $userAddress): JsonResponse
    {
        auth()->user()->addresses()->find($userAddress->id)->delete();

        return $this->success('shipping address deleted');
    }
}
