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
            'images' => ImageResource::collection($this->images),
            'author' => $this->author->first_name . ' ' . $this->author->last_name,
            'prices' => CurrencyPriceRequest::collection($this->currency_prices),
            'category' => new CategoryResource($this->category),
            'inventory' => StockResource::collection($this->stocks),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'description' => $this->getTranslations('description'),
            'order_quantity' => $this->when(isset($this->quantity), $this->quantity),
        ];
    }
}
