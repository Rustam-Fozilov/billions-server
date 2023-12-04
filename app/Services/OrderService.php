<?php

namespace App\Services;

use App\Http\Requests\StoreOrderRequest;

class OrderService
{
    public function createOrder(StoreOrderRequest $request, $address, array $books, float|int $sum)
    {
        return auth()->user()->orders()->create([
            'comment' => $request->comment,
            'delivery_method_id' => $request->delivery_method_id,
            'payment_type_id' => $request->payment_type_id,
            'address' => $address,
            'books' => $books,
            'sum' => $sum + 30000,
            'status_id' => in_array($request['payment_type_id'], [1, 2]) ? 1 : 10,
        ]);
    }
}
