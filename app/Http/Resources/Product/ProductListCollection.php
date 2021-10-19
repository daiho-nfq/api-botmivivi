<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\PaginationCollection;

class ProductListCollection extends PaginationCollection
{
    public function toArray($request)
    {
        return [
            'data' => ProductBaseResource::collection($this->collection),
            'meta' => [
                'pagination' => $this->pagination,
            ],
        ];
    }
}
