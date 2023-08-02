<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{

    public function index()
    {
        return response(BookResource::collection(Book::cursorPaginate(25)));
    }


    public function create()
    {
        //
    }


    public function store(StoreBookRequest $request)
    {
        //
    }


    public function show($id)
    {
        return response(Book::with('stocks')->find($id));
    }


    public function edit(Book $book)
    {
        //
    }


    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }


    public function destroy(Book $book)
    {
        //
    }
}
