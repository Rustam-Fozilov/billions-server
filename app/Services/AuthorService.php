<?php

namespace App\Services;

use App\Models\Author;
use Illuminate\Database\Eloquent\Collection;

class AuthorService
{
    public function search($query): Collection|array
    {
        return Author::query()
            ->where('first_name->uz', 'LIKE', '%' . $query . '%')
            ->orWhere('first_name->ru', 'LIKE', '%' . $query . '%')
            ->orWhere('last_name->uz', 'LIKE', '%' . $query . '%')
            ->orWhere('last_name->ru', 'LIKE', '%' . $query . '%')
            ->get();
    }
}
