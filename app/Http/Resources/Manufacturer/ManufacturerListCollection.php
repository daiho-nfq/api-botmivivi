<?php

namespace App\Http\Resources\Manufacturer;

use App\Http\Resources\PaginationCollection;

class ManufacturerListCollection extends PaginationCollection
{
    public function toArray($request)
    {
        return [
            'data' => ManufacturerResource::collection($this->collection),
            'meta' => [
                'pagination' => $this->pagination,
            ],
        ];
    }
}
