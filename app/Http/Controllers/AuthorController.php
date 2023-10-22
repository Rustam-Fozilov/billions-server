<?php

namespace App\Http\Controllers;

use App\Http\Resources\AuthorResource;
use App\Http\Resources\BookResource;
use App\Models\Author;
use App\Http\Requests\StoreAuthorRequest;
use App\Http\Requests\UpdateAuthorRequest;
use App\Services\AuthorService;
use Illuminate\Http\JsonResponse;
use function PHPUnit\Framework\isEmpty;

class AuthorController extends Controller
{
    public function __construct(
        protected AuthorService $authorService
    )
    {
    }


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
        $authors = $this->authorService->search($query);

        if ($authors->isEmpty()) {
            return $this->error('No results found');
        }

        return $this->success(
            'Search results',
            AuthorResource::collection($authors)
        );
    }
}
