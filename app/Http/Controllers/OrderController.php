<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Services\BookService;
use App\Services\OrderService;
use App\Services\StockService;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    public function __construct(
        protected OrderService $orderService,
        protected StockService $stockService,
        protected BookService $bookService,
    )
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

        /* Stockda product borligiga tekshirish */
        list($sum, $books, $notFoundBooks) = $this->bookService->checkForStock($request, $sum, $books, $notFoundBooks);

        /* Bor bo'lsa buyurtma yaratish */
        if ($notFoundBooks === [] && $books !== [] && $sum !== 0) {
            $order = $this->orderService->createOrder($request, $address, $books, $sum);

            if ($order) {
                $this->stockService->removeFromStock($books);
            }

            return $this->success('order created', $order);
        }

        /* Yo'q bo'lsa xabar qaytarish */
        return $this->error('some books not found', [
            'not_found_books' => $notFoundBooks,
            'found_books' => $books
        ]);
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
