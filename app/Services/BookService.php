<?php

namespace App\Services;

use App\Models\Book;

class BookService
{
    public function search(string $query)
    {
        $books = Book::query()
            ->where('name->uz', 'LIKE', '%' . $query . '%')
            ->orWhere('name->ru', 'LIKE', '%' . $query . '%')
            ->orWhere('description->uz', 'LIKE', '%' . $query . '%')
            ->orWhere('description->ru', 'LIKE', '%' . $query . '%')
            ->limit(20)
            ->get();


        if ($books->isEmpty()) {
            $books = Book::query()
                ->whereHas('author', function ($q) use ($query) {
                    $q->where('first_name', 'LIKE', '%' . $query . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $query . '%');
                })
                ->limit(20)
                ->get();
        }


        return $books;
    }
}
