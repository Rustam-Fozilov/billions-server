<?php

namespace App\Http\Resources;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'comment' => $this->comment,
            'delivery_method' => $this->deliveryMethod,
            'payment_type' => $this->paymentType,
            'sum' => $this->sum,
            'books' => $this->books,
            'address' => $this->address,
            'status' => $this->status,
        ];
    }
}
