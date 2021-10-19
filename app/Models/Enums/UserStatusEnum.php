<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

class UserStatusEnum extends Enum
{
    public const STATUS_ACTIVE = 'active';

    public const STATUS_INACTIVE = 'inactive';

    public static function getStatuses(): array
    {
        return [
            self::STATUS_ACTIVE,
            self::STATUS_INACTIVE,
        ];
    }
}
