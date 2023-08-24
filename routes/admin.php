<?php

use App\Http\Controllers\StatisticsController;
use Illuminate\Support\Facades\Route;



Route::prefix('statistics')->group(function() {

    Route::get('orders-count', [StatisticsController::class, 'ordersCount']);

});
