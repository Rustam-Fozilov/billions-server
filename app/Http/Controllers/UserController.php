<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(): JsonResponse
    {
        return $this->response(
            UserResource::collection(User::all())
        );
    }


    public function store(StoreUserRequest $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function update(UpdateUserRequest $request, string $id): JsonResponse
    {
        $user = User::find($id);

        $user->update([
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'phone' => $request['phone'],
            'email' => $request['email']
        ]);

        return $this->success('User updated successfully', $user);
    }


    public function destroy(string $id)
    {
        //
    }
}
