<?php

namespace App\Http\Resources\Api\Offer;

use App\Http\Resources\Api\Product\IndexResource as ProductIndexResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'price' => $this->price,
            'discount' => $this->discount,
            'product' => ProductIndexResource::make($this->whenLoaded('product'))
        ];
    }
}
