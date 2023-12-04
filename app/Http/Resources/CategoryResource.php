<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $resource = [
            'id' => $this->id,
            'name' => $this->getTranslations('name'),
            'image' => new ImageResource($this->image),
            'priority' => $this->priority,
            'path_name' => $this->path_name,
            'parent_id' => $this->parent_id ?? null,
        ];

        foreach (self::collection($this->child_categories) as $child_category) {
            $resource['child_id'][] = $child_category->id;
        }

        return $resource;
    }
}
