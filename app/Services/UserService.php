<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function create($data)
    {
        return User::create(
            $data
        );
    }
}
