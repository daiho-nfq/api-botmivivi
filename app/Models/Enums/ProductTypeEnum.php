<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

class ProductTypeEnum extends Enum
{
    public const BAG = 'bag';

    public const JAR = 'jar';

    public const BOTTLE = 'bottle';

    public static function getProductType(): array
    {
        return [
            self::BAG,
            self::JAR,
            self::BOTTLE,
        ];
    }
}
