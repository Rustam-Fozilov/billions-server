<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(StoreOrderRequest $request)
    {
        dd($request);
    }


    public function show(Order $order)
    {
        //
    }


    public function edit(Order $order)
    {
        //
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
