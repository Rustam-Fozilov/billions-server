<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryBookController extends Controller
{
    public function index(Category $category): JsonResponse
    {
        return $this->response(
            BookResource::collection($category->books()->cursorPaginate(25))
        );
    }
}
