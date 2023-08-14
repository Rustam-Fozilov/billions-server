<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserAddressResource;
use App\Models\UserAddress;
use App\Http\Requests\StoreUserAddressRequest;
use App\Http\Requests\UpdateUserAddressRequest;
use Illuminate\Http\JsonResponse;
use function Sodium\add;

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


    public function create()
    {
        //
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


    public function edit(UserAddress $userAddress)
    {
        //
    }


    public function update(UpdateUserAddressRequest $request, UserAddress $userAddress)
    {
        //
    }


    public function destroy(UserAddress $userAddress)
    {
        //
    }
}
