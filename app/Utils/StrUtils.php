<?php

declare(strict_types=1);

namespace App\Utils;

final class StrUtils
{
    protected static $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

    public static function generateUniqueLenght10(): string
    {
        return self::generateUnique(10);
    }

    public static function generateUnique(int $length = 15, string $characters = null): string
    {
        $token = '';
        if (is_null($characters)) {
            $characters = self::$characters;
        }
        $max = strlen($characters) - 1;

        for ($i = 0; $i < $length; $i++) {
            $token .= $characters[self::cryptRandSecure(0, $max)];
        }

        return $token;
    }

    private static function cryptRandSecure(int $min, int $max)
    {
        $range = $max - $min;

        if ($range < 1) {
            return $min; // not so random...
        }

        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1

        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd &= $filter; // discard irrelevant bits
        } while ($rnd >= $range);

        return $min + $rnd;
    }
}
