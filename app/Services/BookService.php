<?php

namespace App\Services;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Contracts\Pagination\Paginator;

class BookService
{
    public function __construct(
        protected ValueService $valueService
    )
    {
    }

    public function search(string $query): Paginator
    {
        $books = Book::query()
            ->where('name->uz', 'LIKE', '%' . $query . '%')
            ->orWhere('name->ru', 'LIKE', '%' . $query . '%')
            ->orWhere('description->uz', 'LIKE', '%' . $query . '%')
            ->orWhere('description->ru', 'LIKE', '%' . $query . '%')
            ->simplePaginate(30);

        if ($books->isEmpty()) {
            $books = Book::query()
                ->whereHas('author', function ($q) use ($query) {
                    $q->where('first_name', 'LIKE', '%' . $query . '%')
                        ->orWhere('last_name', 'LIKE', '%' . $query . '%');
                })
                ->simplePaginate(30);
        }

        return $books;
    }

    public function create($request)
    {
        $book = Book::create([
            'category_id' => $request['category_id'],
            'author_id' => $request['author_id'],
            'name' => $request['name'],
            'description' => $request['description'],
            'short_description' => $request['short_description']
        ]);

        $this->create_book_prices($book, $request['price']);
        $this->create_book_images($request['images'], $book);
        $this->create_book_stocks($book, $request);

        return $this->success('Book created successfully', $book);
    }

    public function create_book_prices($book, $price): void
    {
        $book->currency_prices()->create([
            'currency_id' => 1, // dollar
            'price' => $price / 12000
        ]);
        $book->currency_prices()->create([
            'currency_id' => 2, // so'm
            'price' => $price
        ]);
    }

    public function create_book_images($images, $book): void
    {
        foreach ($images as $image) {
            $book->images()->create([
                'link' => $image['link'],
                'quality' => $image['quality'] ?? null
            ]);
        }
    }

    public function create_book_stocks($book, $request): void
    {
        $book->stocks()->create([
            'quantity' => $request['quantity'],
            'attributes' => json_encode([
                [
                    'attribute_id' => 1,
                    'value_id' => $this->valueService->findOrCreate($request['number_of_pages'], 1)
                ],
                [
                    'attribute_id' => 2,
                    'value_id' => $this->valueService->findOrCreate($request['year'], 2)
                ],
                [
                    'attribute_id' => 3,
                    'value_id' => $this->valueService->findOrCreate($request['cover_type'], 3)
                ],
                [
                    'attribute_id' => 4,
                    'value_id' => $this->valueService->findOrCreate($request['language'], 4)
                ]
            ])
        ]);
    }

    public function checkForStock(StoreOrderRequest $request, float|int $sum, array $books, array $notFoundBooks): array
    {
        foreach ($request->books as $bookRequest) {
            $book = Book::with('stocks')->findOrFail($bookRequest['book_id']);
            $book->quantity = $bookRequest['quantity'];


            if (
                /* Product stockda bormi tekshirish */
                $book->stocks()->find($bookRequest['stock_id']) &&
                $book->stocks()->find($bookRequest['stock_id'])->quantity >= $bookRequest['quantity']
            ) {
                $bookWithStock = $book->withStock($bookRequest['stock_id']);
                $bookResource = new BookResource($bookWithStock);


                $sum += $bookResource['currency_prices'][1]['price'] * $bookResource['quantity'];
                $books[] = $bookResource->resolve();
            } else {
                $bookRequest['we_have'] = $book->stocks()->find($bookRequest['stock_id'])->quantity;
                $notFoundBooks[] = $bookRequest;
            }
        }
        return array($sum, $books, $notFoundBooks);
    }
}
