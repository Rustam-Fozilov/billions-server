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
            'icon' => $this->icon,
            'priority' => $this->priority,
            'parent_id' => $this->parent_id ?? null,
        ];

        foreach (self::collection($this->child_categories) as $child_category) {
            $resource['child_id'][] = $child_category->id;
        }

        return $resource;
    }
}
