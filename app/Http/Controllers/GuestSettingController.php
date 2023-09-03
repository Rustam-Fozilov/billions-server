<?php

namespace App\Http\Controllers;

use App\Http\Requests\GuestSettingRequest;
use App\Http\Resources\GuestSettingResource;
use App\Models\GuestSetting;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class GuestSettingController extends Controller
{
    public function index(): JsonResponse
    {
        return $this->response(
            GuestSettingResource::collection(GuestSetting::all())
        );
    }


    public function update(GuestSettingRequest $request, GuestSetting $guestSetting): JsonResponse
    {
        $guestSetting->update([
            'setting_id' => $request['setting_id'],
            'value_id' => $request['value_id'],
            'switch' => $request['switch'],
        ]);

        return $this->success('Guest setting updated',
            new GuestSettingResource($guestSetting)
        );
    }
}
