<?php

namespace App\Http\Controllers;

use App\Http\Resources\ReviewResource;
use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use Illuminate\Http\JsonResponse;

class ReviewController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except('index');
    }


    public function index(): JsonResponse
    {
        return $this->response(
            ReviewResource::collection(Review::all())
        );
    }


    public function store(StoreReviewRequest $request)
    {
        //
    }


    public function show(Review $review)
    {
        //
    }


    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }


    public function destroy(Review $review): JsonResponse
    {
        $review->delete();

        return $this->success('review deleted');
    }
}
