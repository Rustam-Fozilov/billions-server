<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AuthorResource extends JsonResource
{
    /**
     * @param string|null $wrap
     */
    public static function setWrap(?string $wrap): void
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
            'photo' => $this->photo,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'description' => $this->description,
            'books' => $this->when($request->withBooks, BookResource::collection($this->books)),
        ];
    }
}
