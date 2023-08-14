<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookReviewController;
use App\Http\Controllers\CategoryBookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DeliveryMethodController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentTypeController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\StatusOrderController;
use App\Http\Controllers\UserAddressController;
use App\Http\Controllers\UserPaymentCardController;
use App\Http\Controllers\UserSettingController;
use Illuminate\Support\Facades\Route;


Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout']);
Route::post('register', [AuthController::class, 'register']);
Route::get('user', [AuthController::class, 'user'])->middleware('auth:sanctum');

Route::apiResources([
    'categories' => CategoryController::class,
    'categories.books' => CategoryBookController::class,
    'statuses' => StatusController::class,
    'statuses.orders' => StatusOrderController::class,
    'favorites' => FavoritesController::class,
    'books' => BookController::class,
    'orders' => OrderController::class,
    'delivery-methods' => DeliveryMethodController::class,
    'payment-types' => PaymentTypeController::class,
    'user-addresses' => UserAddressController::class,
//    'user-payment-cards' => UserPaymentCardController::class,
    'reviews' => ReviewController::class,
    'books.reviews' => BookReviewController::class,
    'settings' => SettingController::class,
    'user-settings' => UserSettingController::class,
]);
