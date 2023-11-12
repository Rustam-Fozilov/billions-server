<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function create(
        string $first_name = null,
        string $last_name = null,
        string $phone = null,
        string $email = null,
        string $password = null
    )
    {
        return User::create([
            'first_name' => $first_name,
            'last_name' => $last_name,
            'phone' => $phone,
            'email' => $email,
            'password' => $password
        ]);
    }

    public function findOrCreate(
        string $first_name = null,
        string $last_name = null,
        string $phone = null,
        string $email = null,
        string $password = null
    )
    {
        if ($user = User::where('phone', $phone)->first()) {
            return $user;
        }

        return $this->create(
            $first_name,
            $last_name,
            $phone,
            $email,
            $password
        );
    }

    public function find($column, $value)
    {
        return User::where($column, $value)->first();
    }
}
