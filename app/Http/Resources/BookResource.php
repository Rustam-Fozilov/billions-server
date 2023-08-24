<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
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
            'name' => $this->getTranslations('name'),
            'prices' => CurrencyPriceRequest::collection($this->currency_prices),
            'author' => $this->author->first_name . ' ' . $this->author->last_name,
            'category' => new CategoryResource($this->category),
            'description' => $this->getTranslations('description'),
            'inventory' => StockResource::collection($this->stocks),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'order_quantity' => $this->when(isset($this->quantity), $this->quantity),
            'links' => [
                'self' => 'link-value',
            ],
        ];
    }
}
