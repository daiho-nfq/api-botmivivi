<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

class ProductWeightEnum extends Enum
{
    public const WEIGHT_500_GR = 0.5; //0,5kg

    public const WEIGHT_1_KG = 1;

    public const WEIGHT_5_KG = 5;

    public const WEIGHT_10_KG = 10;

    public const WEIGHT_20_KG = 20;

    public const WEIGHT_25_KG = 25;

    public const WEIGHT_40_KG = 40;

    public const WEIGHT_50_KG = 50;

    public static function getProductWeight(): array
    {
        return [
            self::WEIGHT_500_GR,
            self::WEIGHT_1_KG,
            self::WEIGHT_5_KG,
            self::WEIGHT_10_KG,
            self::WEIGHT_20_KG,
            self::WEIGHT_25_KG,
            self::WEIGHT_40_KG,
            self::WEIGHT_50_KG,
        ];
    }
}
