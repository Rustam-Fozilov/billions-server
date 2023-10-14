<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use Illuminate\Http\JsonResponse;

class AuthorController extends Controller
{

    public function index(): JsonResponse
    {
        return $this->response(
            AuthorResource::collection(Author::all())
        );
    }


    public function create()
    {
        //
    }


    public function store(StoreAuthorRequest $request)
    {
        //
    }


    public function show(Author $author): JsonResponse
    {
        return $this->response(
            new AuthorResource($author)
        );
    }


    public function update(UpdateAuthorRequest $request, Author $author)
    {
        //
    }


    public function destroy(Author $author)
    {
        //
    }
}
