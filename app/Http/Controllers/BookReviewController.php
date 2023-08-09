<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreReviewRequest;
use App\Http\Resources\ReviewResource;
use App\Models\Book;
use Illuminate\Http\JsonResponse;

class BookReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(Book $book): JsonResponse
    {
        return response()->json([
            'overall_rating' => round($book->reviews()->avg('rating'), 1),
            'reviews_count' => $book->reviews()->count(),
            'reviews' => ReviewResource::collection($book->reviews()->paginate(10)),
        ]);
    }

    public function store(Book $book, StoreReviewRequest $request): JsonResponse
    {
        $book->reviews()->create([
            'user_id' => auth()->id(),
            'rating' => $request['rating'],
            'body' => $request['body']
        ]);

        return response()->json([
            'success' => true
        ]);
    }
}
