<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookReviewController;
use App\Http\Controllers\CategoryBookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\GuestSettingController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserReviewsController;
use App\Http\Controllers\UserSettingController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;


Route::delete('cart', [CartController::class, 'destroyAll']);
Route::post('books/filter', [BookController::class, 'filter']);
Route::get('books/search/{query}', [BookController::class, 'search']);
Route::get('books/{book}/related', [BookController::class, 'related']);
Route::get('authors/search/{query}', [AuthorController::class, 'search']);


Route::apiResources([
    'user' => UserController::class,
    'cart' => CartController::class,
    'books' => BookController::class,
    'orders' => OrderController::class,
    'reviews' => ReviewController::class,
    'authors' => AuthorController::class,
    'statuses' => StatusController::class,
    'settings' => SettingController::class,
    'favorites' => FavoritesController::class,
    'categories' => CategoryController::class,
    'books.reviews' => BookReviewController::class,
    'user-reviews' => UserReviewsController::class,
    'user-settings' => UserSettingController::class,
    'payment-types' => PaymentTypeController::class,
    'user-addresses' => UserAddressController::class,
    'guest-settings' => GuestSettingController::class,
    'statuses.orders' => StatusOrderController::class,
    'categories.books' => CategoryBookController::class,
    'delivery-methods' => DeliveryMethodController::class,
]);
