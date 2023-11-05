<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ReviewResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'user' => new UserResource($this->user),
            'book_id' => $this->book_id,
            'rating' => $this->rating,
            'body' => $this->body,
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y H:i:s'),
        ];
    }
}
