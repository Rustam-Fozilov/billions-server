<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Bestseller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BestsellerController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        $books = Book::query()
            ->join('bestsellers', 'books.id', '=', 'bestsellers.book_id')
            ->select('books.*')
            ->simplePaginate($request['limit'] ?? 20);

        return $this->response(
            BookResource::collection($books)
        );
    }
}
