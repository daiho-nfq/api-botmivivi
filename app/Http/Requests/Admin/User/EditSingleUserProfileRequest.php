<?php

namespace App\Http\Requests\Admin\User;

use App\Http\Requests\UserProfileRequest;
use App\Models\Enums\UserRoleEnum;

class EditSingleUserProfileRequest extends UserProfileRequest
{
    public function rules()
    {
        $userId = $this->get('user')->id;

        return array_merge(parent::customRules($userId),[
            'role' => ['sometimes', 'required', 'in:' . implode(',', UserRoleEnum::getRoles())],
        ]);
    }
}
