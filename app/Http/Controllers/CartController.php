<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use App\Services\CartService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct(
        protected CartService $cartService
    )
    {
        $this->middleware('auth:sanctum');
    }


    public function index(): JsonResponse
    {
        return $this->response(
            CartResource::collection(auth()->user()->booksInCart)
        );
    }


    public function store(CartRequest $request): JsonResponse
    {
        if ($request->books) {
            return $this->cartService->storeAll($request->books);
        }

        return $this->cartService->store($request);
    }


    public function show(Cart $cart): JsonResponse
    {
        return $this->response(
            new CartResource($cart)
        );
    }


    public function update(Request $request, Cart $cart): JsonResponse
    {
        return $this->cartService->update($request['book_id'], $request['quantity'], $request['originalPrice']);
    }


    public function destroy(Cart $cart): JsonResponse
    {
        $cart->delete();

        return $this->success('Cart deleted successfully',
            new CartResource($cart)
        );
    }


    public function destroyAll(): JsonResponse
    {
        auth()->user()->booksInCart()->delete();

        return $this->success('All books deleted successfully from cart');
    }
}
