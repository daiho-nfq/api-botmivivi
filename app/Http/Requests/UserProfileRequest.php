<?php

namespace App\Http\Requests;

use App\Models\Enums\UserGenderEnum;
use App\Models\Enums\UserStatusEnum;

class UserProfileRequest extends AbstractFormRequest
{
    public function  customRules(int $id)
    {
        return [
            'id_card' => ['sometimes', 'required', 'unique:users,id_card,' . $id, 'max:12'],
            'full_name' => ['sometimes', 'required', 'max:255'],
            'phone_number' => ['sometimes', 'required', 'unique:users,phone_number,' . $id, 'max:12'],
            'date_of_birth' => ['sometimes', 'required', 'date', 'date_format:Y-m-d'],
            'gender' => ['sometimes', 'required', 'in:' . implode(',', UserGenderEnum::getGenders())],
            'status' => ['sometimes', 'required', 'in:' . implode(',', UserStatusEnum::getStatuses())],
            'house_number' => ['sometimes', 'required', 'max:255'],
            'street' => ['sometimes', 'required', 'max:255'],
            'ward' => ['sometimes', 'required', 'max:255'],
            'district' => ['sometimes', 'required', 'max:255'],
            'city' => ['sometimes', 'required', 'max:255'],
            'home_town' => ['sometimes', 'required', 'max:255'],
        ];
    }
}
