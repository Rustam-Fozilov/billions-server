<?php

namespace App\Services;

use App\Http\Requests\StoreUserSettingRequest;

class UserSettingService
{
    public function create(StoreUserSettingRequest $request)
    {
        return auth()->user()->settings()->create([
            'setting_id' => $request['setting_id'],
            'value_id' => $request['value_id'] ?? null,
            'switch' => $request['switch'] ?? null,
        ]);
    }
}
