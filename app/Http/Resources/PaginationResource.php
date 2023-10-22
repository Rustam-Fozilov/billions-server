<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaginationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'path' => $this->path,
            'count' => $this->per_page,
            'next_cursor' => $this->next_cursor,
            'prev_cursor' => $this->prev_cursor,
            'next_page_url' => $this->next_page_url,
            'prev_page_url' => $this->prev_page_url,
//            'per_page' => $this->perPage(),
//            'current_page' => $this->currentPage(),
//            'total_pages' => $this->lastPage()
        ];
    }
}
