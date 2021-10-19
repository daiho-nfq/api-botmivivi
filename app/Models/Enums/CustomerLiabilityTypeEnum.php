<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

class CustomerLiabilityTypeEnum extends Enum
{
    public const SHORT_TERM = 'short_term';

    public const LONG_TERM = 'long_term';

    public const OTHER = 'other';

    public function getCustomerLiabilityTypes(): array
    {
        return [
            self::SHORT_TERM,
            self::LONG_TERM,
            self::OTHER,
        ];
    }
}
