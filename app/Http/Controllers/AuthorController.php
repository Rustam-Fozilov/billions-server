<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Models\User;
use App\Services\AuthorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function __construct(
        protected AuthorService $authorService
    )
    {
    }


    public function index(): JsonResponse
    {
        AuthorResource::setWrap('authors');

        return $this->response(
            AuthorResource::collection(
                Author::simplePaginate(30)
            )->response()->getData(true)
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
            new AuthorResource(Author::query()->with('books')->find($author->id))
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


    public function search($query): JsonResponse
    {
        AuthorResource::setWrap('authors');

        $authors = $this->authorService->search($query);

        if ($authors->isEmpty()) {
            return $this->error('No results found');
        }

        return $this->success(
            'Search results',
            AuthorResource::collection($authors)->response()->getData(true)
        );
    }
}
