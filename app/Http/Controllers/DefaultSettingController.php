<?php

namespace App\Http\Controllers;

use App\Http\Resources\DefaultSettingResource;
use App\Models\DefaultSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DefaultSettingController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->response(
            DefaultSettingResource::collection(DefaultSetting::all())
        );
    }



}
