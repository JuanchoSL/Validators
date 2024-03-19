<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Numbers;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\RegexValidatorsInterface;

class NumberValidation implements BasicValidatorsInterface, LengthValidatorsInterface, RegexValidatorsInterface
{

    public static function is(string|int|float|bool|null $var): bool
    {
        return is_numeric($var);
    }
    public static function isEmpty(string|int|float|bool|null $var): bool
    {
        return empty ($var);
    }

    public static function isNotEmpty(string|int|float|bool|null $var): bool
    {
        return !empty ($var);
    }

    public static function isLengthGreatherThan(string|int|float|bool|null $var, int $limit): bool
    {
        return self::is($var) && strlen((string) $var) > $limit;
    }
    public static function isLengthGreatherOrEqualsThan(string|int|float|bool|null $var, int $limit): bool
    {
        return self::is($var) && strlen((string) $var) >= $limit;
    }
    public static function isLengthLessThan(string|int|float|bool|null $var, int $limit): bool
    {
        return self::is($var) && strlen((string) $var) < $limit;
    }
    public static function isLengthLessOrEqualsThan(string|int|float|bool|null $var, int $limit): bool
    {
        return self::is($var) && strlen((string) $var) <= $limit;
    }

    public static function isRegex(string|int|float|bool|null $var, string $expresion): bool
    {
        $results = [];
        preg_match($expresion, (string) $var, $results);
        return !empty ($results);
    }

}