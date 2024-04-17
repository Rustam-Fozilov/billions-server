<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class BookResource extends JsonResource
{
    /**
     * @param string $wrap
     */
    public static function setWrap(string $wrap): void
    {
        self::$wrap = $wrap;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'pivot' => $this->pivot,
            'name' => $this->name,
            'images' => ImageResource::collection($this->images),
            'author' => $this->when($request->withAuthor, new AuthorResource($this->author)),
            'prices' => CurrencyPriceResource::collection($this->currency_prices),
            'category' => new CategoryResource($this->category),
            'inventory' => StockResource::collection($this->stocks),
            'created_at' => Carbon::parse($this->created_at)->format('d.m.Y H:i:s'),
            'updated_at' => $this->updated_at,
            'description' => $this->description,
            'order_quantity' => $this->when(isset($this->quantity), $this->quantity),
            'short_description' => $this->short_description,
        ];
    }
}
