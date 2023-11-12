<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Services\BookService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function __construct(
        protected BookService $bookService
    )
    {
    }


    public function index(Request $request): JsonResponse
    {
        return $this->response(
            BookResource::collection(Book::paginate($request['limit'] ?? 20))
        );
    }


    public function store(StoreBookRequest $request)
    {
        //
    }


    public function show($id): JsonResponse
    {
        return $this->response(
            new BookResource(Book::find($id))
        );
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


    public function search($query): JsonResponse
    {
        BookResource::setWrap('books');

        $result = $this->bookService->search($query);

        if ($result->isEmpty()) {
            return $this->error('No results found');
        }

        return $this->success(
            'Search results',
            BookResource::collection($result)->response()->getData(true)
        );
    }


    public function filter(Request $request)
    {
        $books = $this->bookService->filter($request);

        dd($books);

        return $this->response(
            $books
        );
    }
}
