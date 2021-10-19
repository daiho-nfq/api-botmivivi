<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

class CustomerPurchaseTypeEnum extends Enum
{
    public const DIRECT_PURCHASE = "direct_purchase";

    public const ONE_TIME_PAYMENT = "one_time_payment";

    public const OVERLAPPING = "overlapping";

    public const CASH = "cash";

    public static function getCustomerPurchaseTypes(): array
    {
        return [
            self::DIRECT_PURCHASE,
            self::ONE_TIME_PAYMENT,
            self::OVERLAPPING,
            self::CASH,
        ];
    }
}
