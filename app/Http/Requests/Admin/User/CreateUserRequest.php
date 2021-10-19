<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\AbstractFormRequest;
use App\Models\Enums\UserGenderEnum;
use App\Models\Enums\UserRoleEnum;

class CreateUserRequest extends AbstractFormRequest
{
    public function rules()
    {
        return [
            'email' => ['required', 'max:255', 'email:filter', 'unique:users'],
            'password' => ['required', 'min:6', 'max:50', 'different:email'],
            'id_card' => ['required', 'unique:users,id_card', 'max:12'],
            'full_name' => ['required', 'max:255'],
            'phone_number' => ['required', 'unique:users,phone_number', 'max:12'],
            'date_of_birth' => ['required', 'date', 'date_format:Y-m-d'],
            'gender' => ['required', 'in:' . implode(',', UserGenderEnum::getGenders())],
            'role' => ['required', 'in:' . implode(',', UserRoleEnum::getRoles())],
        ];
    }
}
