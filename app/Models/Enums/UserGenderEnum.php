<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

class UserGenderEnum extends Enum
{
    public const GENDER_MALE = 'male';

    public const GENDER_FEMALE = 'female';

    public static function getGenders(): array
    {
        return [
            self::GENDER_MALE,
            self::GENDER_FEMALE,
        ];
    }
}
