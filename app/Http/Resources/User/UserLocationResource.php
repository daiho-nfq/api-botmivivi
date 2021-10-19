<?php

namespace App\Http\Resources\User;

use App\Http\Resources\AbstractJsonResource;

class UserLocationResource extends AbstractJsonResource
{
    public function toArray($request)
    {
        return [
            'house_number' => $this->house_number,
            'street' => $this->street,
            'ward' => $this->ward,
            'district' => $this->district,
            'city' => $this->city,
            'home_town' => $this->home_town,
        ];
    }
}
