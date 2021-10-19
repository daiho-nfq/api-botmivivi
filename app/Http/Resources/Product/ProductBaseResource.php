<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductBaseResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'code' => $this->code,
            'name' => $this->name,
            'protein' => $this->protein,
            'type' => $this->type,
            'weight' => $this->weight,
            'use' => $this->use,
            'price' => $this->whenLoaded('productPrice', new ProductPriceResource($this->productPrice)),
        ];
    }
}
