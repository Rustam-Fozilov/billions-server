<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DefaultSettingResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'setting' => $this->setting,
            'value' => new ValueResource($this->value),
            'switch' => $this->switch === null ? null : (bool) $this->switch,
        ];
    }
}
