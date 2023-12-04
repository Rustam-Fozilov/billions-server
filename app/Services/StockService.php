<?php

namespace App\Services;

use App\Models\Stock;

class StockService
{
    public function removeFromStock(array $books): void
    {
        foreach ($books as $book) {
            $stock = Stock::find($book['inventory'][0]['id']);
            $stock->quantity -= $book['order_quantity'];
            $stock->save();
        }
    }
}
