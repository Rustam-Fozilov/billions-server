<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        return $this->response(
            BookResource::collection(Book::paginate($request['limit'] ?? 20))
        );
    }


    public function create()
    {
        //
    }


    public function store(StoreBookRequest $request)
    {
        //
    }


    public function show($id)
    {
        return response(Book::with('stocks')->find($id));
    }


    public function edit(Book $book)
    {
        //
    }


    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }


    public function destroy(Book $book)
    {
        //
    }

    public function related(Book $book): JsonResponse
    {
        $books = Book::query()->where('category_id', $book->category_id)->limit(20)->get();

        return $this->response(
            BookResource::collection($books)
        );
    }
}
