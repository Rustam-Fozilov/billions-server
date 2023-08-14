<?php

namespace App\Http\Controllers;

use App\Http\Resources\SettingResource;
use App\Models\Setting;
use App\Http\Requests\StoreSettingRequest;
use App\Http\Requests\UpdateSettingRequest;
use Illuminate\Http\JsonResponse;

class SettingController extends Controller
{

    public function index(): JsonResponse
    {
        return $this->response(
            SettingResource::collection(Setting::all())
        );
    }


    public function create()
    {
        //
    }


    public function store(StoreSettingRequest $request)
    {
        //
    }


    public function show(Setting $setting)
    {
        //
    }


    public function edit(Setting $setting)
    {
        //
    }


    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        //
    }


    public function destroy(Setting $setting)
    {
        //
    }
}
