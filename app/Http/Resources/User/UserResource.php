<?php

namespace App\Http\Resources\User;

use App\Http\Resources\AbstractJsonResource;

class UserResource extends AbstractJsonResource
{
    public function toArray($request)
    {
        return [
            'uuid' => $this->unique_identifier,
            'email' => $this->email,
            'id_card' => $this->id_card,
            'full_name' => $this->full_name,
            'phone_number' => $this->phone_number,
            'date_of_birth' => $this->date_of_birth,
            'age' => $this->age,
            'gender' => $this->gender,
            'status' => $this->status,
            'role' => $this->role,
            'email_verified_at' => $this->email_verified_at,
            $this->mergeWhen($this->userLocation, [
                'location' => $this->whenLoaded('userLocation', new UserLocationResource($this->userLocation))
            ]),
        ];
    }
}
