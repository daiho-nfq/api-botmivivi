<?php

namespace App\Models\ModelTraits;

use App\Models\Enums\UserRoleEnum;

trait HasRole
{
    public function isAdmin(): bool
    {
        return $this->role === UserRoleEnum::ROLE_ADMIN;
    }
}
