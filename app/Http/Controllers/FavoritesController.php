<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Resources\BookResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function index(Request $request): JsonResponse
    {
        return $this->response(
            BookResource::collection(auth()->user()->favorites)
        );
    }


    public function store(StoreFavoriteRequest $request): JsonResponse
    {
        auth()->user()->favorites()->attach($request->book_id);

        return $this->success('Added to favorites');
    }


    public function destroy($id): JsonResponse
    {
        if(auth()->user()->hasFavorite($id)) {
            auth()->user()->favorites()->detach($id);

            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false
        ]);
    }
}
