<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductPriceResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'purchase_price' => $this->purchase_price,
            'wholesale_price' => $this->wholesale_price,
            'retail_price' => $this->retail_price,
        ];
    }
}
