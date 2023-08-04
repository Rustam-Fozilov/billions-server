<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryBookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::apiResources([
    'categories' => CategoryController::class,
    'categories.books' => CategoryBookController::class,
    'favorites' => FavoritesController::class,
    'books' => BookController::class,
    'orders' => OrderController::class,
]);
