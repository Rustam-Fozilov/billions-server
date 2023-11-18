<?php

namespace App\Services;

use App\Models\Book;
use Illuminate\Contracts\Pagination\Paginator;

class BookService
{
    public function search(string $query): Paginator
    {
        $books = Book::query()
            ->where('name->uz', 'LIKE', '%' . $query . '%')
            ->orWhere('name->ru', 'LIKE', '%' . $query . '%')
            ->orWhere('description->uz', 'LIKE', '%' . $query . '%')
            ->orWhere('description->ru', 'LIKE', '%' . $query . '%')
            ->simplePaginate(20);


        if ($books->isEmpty()) {
            $books = Book::query()
                ->whereHas('author', function ($q) use ($query) {
                    $q->where('first_name', 'LIKE', '%' . $query . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $query . '%');
                })
                ->simplePaginate(20);
        }


        return $books;
    }


    public function filter($request)
    {
        Book::query()
            ->when($request->has('min_price'), function ($q) use ($request) {
                $q->whereHas('stocks', function ($q) use ($request) {
                    $q->whereJsonContains('attributes->attribute_id', 1);
                })->get();
            })->dd();
//            ->when($request->has('max_price'), function ($q) use ($request) {
//                $q->whereHas('stocks', function ($q) use ($request) {
//                    $q->where('price', '<=', $request->max_price);
//                });
//            })->dd();
    }
}
