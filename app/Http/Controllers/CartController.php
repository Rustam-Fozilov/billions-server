<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartRequest;
use App\Http\Resources\CartResource;
use App\Models\Cart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
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
        $cart = auth()->user()->booksInCart()->create(
            $request->all()
        );

        return $this->success('Book added to cart successfully',
            new CartResource($cart)
        );
    }


    public function show(Cart $cart): JsonResponse
    {
        return $this->response(
            new CartResource($cart)
        );
    }


    public function update(Request $request, Cart $cart): JsonResponse
    {
        $cart->update(
            $request->all()
        );

        return $this->response(
            new CartResource($cart)
        );
    }


    public function destroy(Cart $cart): JsonResponse
    {
        $cart->delete();

        return $this->success('Cart deleted successfully',
            new CartResource($cart)
        );
    }
}
