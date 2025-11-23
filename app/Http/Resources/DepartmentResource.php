<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->resource->id,
            'user_id' => $this->resource->user_id,
            'description' => $this->resource->description,
            'size' => $this->resource->size,
            'rentFee' => $this->resource->rentFee,
            'isAvailable' => $this->resource->isAvailable,
            'status' => $this->resource->status,
            'created_at' => $this->resource->created_at,
            'updated_at' => $this->resource->updated_at,
            'average_rating' => $this->resource->average_rating,
            'review_count' => $this->resource->review_count,
            'images' => $this->resource->images->map(fn($img) => $img->path),
            'location' => [
                'province' => $this->resource->location['province'] ?? null,
                'city' => $this->resource->location['city'] ?? null,
                'district' => $this->resource->location['district'] ?? null,
                'street' => $this->resource->location['street'] ?? null,
            ],
        ];
        return $data;
    }
}
