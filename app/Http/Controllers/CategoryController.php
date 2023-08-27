<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request): JsonResponse
    {
        return $this->response(
            CategoryResource::collection(
                $request['only_parents'] ?
                    Category::where('parent_id', null)->get() :
                    Category::paginate($request['limit'] ?? 10)
            )
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
