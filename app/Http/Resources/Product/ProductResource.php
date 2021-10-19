<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Manufacturer\ManufacturerResource;

class ProductResource extends ProductBaseResource
{
    public function toArray($request)
    {
        return array_merge(parent::toArray($request),
            [
                'manufacturer' => $this->whenLoaded('manufacturer', new ManufacturerResource($this->manufacturer)),
            ]
        );
    }
}
