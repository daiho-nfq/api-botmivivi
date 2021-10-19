<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

class UserRoleEnum extends Enum
{
    public const ROLE_ADMIN = 'admin';

    public const OWNER = 'owner';

    public const ROLE_MANAGER = 'manager';

    public const ROLE_SUPERVISOR = 'supervisor';

    public const ROLE_EMPLOYEE = 'employee';

    public static function getRoles(): array
    {
        return [
            self::OWNER,
            self::ROLE_MANAGER,
            self::ROLE_SUPERVISOR,
            self::ROLE_EMPLOYEE,
        ];
    }
}
