<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Http\Requests\StoreStatusRequest;
use App\Http\Requests\UpdateStatusRequest;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }


    public function index(Request $request)
    {
        if ($request->has('for')) {
            return Status::where('for', $request['for'])->get();
        }

        return Status::all();
    }


    public function create()
    {
        //
    }


    public function store(StoreStatusRequest $request)
    {
        //
    }


    public function show(Status $status)
    {
        //
    }


    public function edit(Status $status)
    {
        //
    }


    public function update(UpdateStatusRequest $request, Status $status)
    {
        //
    }


    public function destroy(Status $status)
    {
        //
    }
}
