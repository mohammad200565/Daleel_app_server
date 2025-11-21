<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $data = [
            'id' => $this->resource->id,
            'first_name' => $this->resource->first_name,
            'last_name' => $this->resource->last_name,
            'phone' => $this->resource->phone,
            'personId' => $this->resource->personId,
            'profileImage' => $this->resource->profileImage,
            'birthdate' => $this->resource->birthdate,
        ];
        return $data;
    }
}
