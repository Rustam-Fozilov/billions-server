<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserReviewResource;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UserReviewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        UserReviewResource::setWrap('reviews');

        return $this->response(
            UserReviewResource::collection(
                auth()->user()->reviews()->orderBy('created_at', 'desc')->simplePaginate(20)
            )->response()->getData(true)
        );
    }
}
