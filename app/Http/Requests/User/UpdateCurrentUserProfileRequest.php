<?php

namespace App\Http\Requests\User;

use App\Http\Requests\UserProfileRequest;

class UpdateCurrentUserProfileRequest extends UserProfileRequest
{
    public function rules()
    {
        $user = $this->user();

        return array_merge(parent::customRules($user->id),[
            'role' => ['sometimes', 'required', 'in:' . $user->role],
        ]);
    }
}
