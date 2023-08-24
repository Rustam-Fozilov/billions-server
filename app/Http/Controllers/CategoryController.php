<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{

    public function index(): JsonResponse
    {
        return $this->response(
            CategoryResource::collection(Category::where('parent_id', null)->get())
        );
    }


    public function store(StoreCategoryRequest $request)
    {
        //
    }


    public function show(Category $category): JsonResponse
    {
        return $this->response(
            new CategoryResource($category)
        );
    }


    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }


    public function destroy(Category $category)
    {
        //
    }
}
