<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Numbers;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\RegexValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;

class NumberValidation extends AbstractValidation implements BasicValidatorsInterface, LengthValidatorsInterface, RegexValidatorsInterface
{

    public static function is(mixed $var): bool
    {
        return is_numeric($var);
    }

    public static function isLengthGreatherThan(string|int|float $var, int $limit): bool
    {
        return self::is($var) && mb_strlen((string) $var) > $limit;
    }
    public static function isLengthGreatherOrEqualsThan(string|int|float $var, int $limit): bool
    {
        return self::is($var) && mb_strlen((string) $var) >= $limit;
    }
    public static function isLengthLessThan(string|int|float $var, int $limit): bool
    {
        return self::is($var) && mb_strlen((string) $var) < $limit;
    }
    public static function isLengthLessOrEqualsThan(string|int|float $var, int $limit): bool
    {
        return self::is($var) && mb_strlen((string) $var) <= $limit;
    }

    public static function isRegex(string|int|float $var, string $expresion): bool
    {
        $results = [];
        preg_match($expresion, (string) $var, $results);
        return !empty($results);
    }

}