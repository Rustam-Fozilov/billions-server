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
            'price' => $this->price,
            'author' => $this->author->name,
            'inventory' => StockResource::collection($this->stocks),
            'category' => new CategoryResource($this->category),
            'description' => $this->getTranslations('description'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
