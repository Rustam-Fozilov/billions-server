<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Http\Resources\OrderResource;
use App\Models\Book;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\Stock;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function index(): JsonResponse
    {
        OrderResource::setWrap('orders');

        if (request()->has('status_id')) {
            return $this->response(
                OrderResource::collection(
                    auth()->user()->orders()->where('status_id', request('status_id'))->orderBy('created_at', 'desc')->simplePaginate(30)
                )->response()->getData(true)
            );
        }

        return $this->response(
            OrderResource::collection(
                auth()->user()->orders()->orderBy('created_at', 'desc')->simplePaginate(30)
            )->response()->getData(true)
        );
    }


    public function store(StoreOrderRequest $request): JsonResponse
    {
        $sum = 0;
        $books = [];
        $notFoundBooks = [];
        $address = auth()->user()->addresses()->find($request->address_id);


        foreach ($request->books as $bookRequest) {
            $book = Book::with('stocks')->findOrFail($bookRequest['book_id']);
            $book->quantity = $bookRequest['quantity'];


            if (
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


        if ($notFoundBooks === [] && $books !== [] && $sum !== 0) {
            $order = auth()->user()->orders()->create([
                'comment' => $request->comment,
                'delivery_method_id' => $request->delivery_method_id,
                'payment_type_id' => $request->payment_type_id,
                'address' => $address,
                'books' => $books,
                'sum' => $sum + 30000,
                'status_id' => in_array($request['payment_type_id'], [1, 2]) ? 1 : 10,
            ]);

            if ($order) {
                foreach ($books as $book) {
                    $stock = Stock::find($book['inventory'][0]['id']);
                    $stock->quantity -= $book['order_quantity'];
                    $stock->save();
                }
            }

            return $this->success('order created', $order);

        } else {
            return $this->error('some books not found', [
                'not_found_books' => $notFoundBooks,
                'found_books' => $books
            ]);
        }
    }


    public function show(Order $order): JsonResponse
    {
        return $this->response(
            new OrderResource($order)
        );
    }


    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }


    public function destroy(Order $order)
    {
        //
    }
}
