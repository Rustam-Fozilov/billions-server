<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Services\BookService;
use App\Services\ValueService;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class BookController extends Controller
{
    public function __construct(
        protected BookService $bookService,
        protected ValueService $valueService
    )
    {
        $this->middleware('admin')->only('store');
    }


    public function index(Request $request): JsonResponse
    {
        return $this->response(
            BookResource::collection(
                Book::orderBy('id', $request['orderByDesc'] ? 'desc' : 'asc')->paginate($request['limit'] ?? 20)
            )
        );
    }


    public function store(StoreBookRequest $request): JsonResponse
    {
        return $this->bookService->create($request);
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


    public function newest(Request $request): JsonResponse
    {
        $books = Book::orderBy('created_at', 'desc')->limit($request['limit'] ?? 20)->get();

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
}
