<?php

namespace App\Http\Resources\User;

use App\Http\Resources\PaginationCollection;

class UserListCollection extends PaginationCollection
{
    public function toArray($request): array
    {
        return [
            'data' => UserResource::collection($this->collection),
            'meta' => [
                'pagination' => $this->pagination,
            ],
        ];
    }

}
