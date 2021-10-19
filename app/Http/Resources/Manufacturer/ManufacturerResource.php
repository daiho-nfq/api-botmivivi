<?php

namespace App\Http\Resources\Manufacturer;

use Illuminate\Http\Resources\Json\JsonResource;

class ManufacturerResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'unique_identifier' => $this->unique_identifier,
            'name' => $this->name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'house_number' => $this->house_number,
            'street' => $this->street,
            'ward' => $this->ward,
            'district' => $this->district,
            'city' => $this->city
        ];
    }
}
