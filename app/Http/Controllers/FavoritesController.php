<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FavoritesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index(): JsonResponse
    {
        return $this->response(
            auth()->user()->favorites
        );
    }

    public function store(Request $request): JsonResponse
    {
        $request->validate([
            'book_id' => 'required|exists:books,id'
        ]);

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
