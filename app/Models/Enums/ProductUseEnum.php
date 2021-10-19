<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

class ProductUseEnum extends Enum
{
    public const BREAD = 'bread';

    public const NOODLE = 'noodle';

    public const CAKE = 'cake';

    public const PIZZA = 'pizza';

    public const DUMPLINGS = 'dumplings';

    public const SANDWICH = 'sandwich';

    public const OTHER = 'other';

    public static function getProductUse(): array
    {
        return [
            self::BREAD,
            self::NOODLE,
            self::CAKE,
            self::PIZZA,
            self::DUMPLINGS,
            self::SANDWICH,
            self::BREAD,
        ];
    }
}
