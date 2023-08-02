<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryBookController extends Controller
{
    public function index(Category $category)
    {
        return response($category->books()->cursorPaginate(25));
    }
}
