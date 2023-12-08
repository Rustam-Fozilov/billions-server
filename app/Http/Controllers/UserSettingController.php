<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserSettingResource;
use App\Models\UserSetting;
use App\Http\Requests\StoreUserSettingRequest;
use App\Http\Requests\UpdateUserSettingRequest;
use App\Services\UserSettingService;
use Illuminate\Http\JsonResponse;

class UserSettingController extends Controller
{
    public function __construct(
        protected UserSettingService $userSettingService
    )
    {
        $this->middleware('auth:sanctum');
    }


    public function index(): JsonResponse
    {
        return $this->response(UserSettingResource::collection(auth()->user()->settings));
    }


    public function store(StoreUserSettingRequest $request): JsonResponse
    {
        if (auth()->user()->settings()->where('setting_id', $request->setting_id)->exists()) {
            return $this->error('setting already exists');
        }

        $userSetting = $this->userSettingService->create($request);

        return $this->success('user setting created', $userSetting);
    }


    public function show(UserSetting $userSetting)
    {
        //
    }


    public function update(UpdateUserSettingRequest $request, UserSetting $userSetting): JsonResponse
    {
        $userSetting->update([
            'switch' => $request->switch ?? null,
            'value_id' => $request->value_id ?? null,
        ]);

        return $this->success('user setting updated');
    }


    public function destroy(UserSetting $userSetting): JsonResponse
    {
        $userSetting->delete();

        return $this->success('user setting deleted');
    }
}
