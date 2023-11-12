<?php

namespace App\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CartService
{
    public function __construct(
        protected Controller $controller
    )
    {
    }

    public function store($request): JsonResponse
    {
        auth()->user()->booksInCart()->create([
            'book_id' => $request['book_id'],
            'quantity' => $request['quantity'],
            'total' => $request['quantity'] * $request['originalPrice']
        ]);

        return $this->controller->success('Book added to cart successfully');
    }

    public function storeAll($books): JsonResponse
    {
        foreach ($books as $book) {
            auth()->user()->booksInCart()->create([
                'book_id' => $book['book_id'],
                'quantity' => $book['quantity'],
                'total' => $book['quantity'] * $book['originalPrice']
            ]);
        }

        return $this->controller->success('All books added to cart successfully');
    }

    public function update($book_id, $quantity, $originalPrice): JsonResponse
    {
        $book = auth()->user()->booksInCart()->where('book_id', $book_id)->first();

        if (is_null($book)) {
            return $this->controller->error('Book not found');
        }

        $book->update([
            'quantity' => $quantity,
            'total' => $quantity * $originalPrice
        ]);

        return $this->controller->success('Cart book updated successfully', $book);
    }
}
