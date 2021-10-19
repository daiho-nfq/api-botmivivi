<?php

namespace App\Models\Enums;

use Spatie\Enum\Enum;

final class AuthGuardsEnum extends Enum
{
    public const WEB = 'web';

    public const API = 'api';

    public const OPERATOR = 'operator';
}
