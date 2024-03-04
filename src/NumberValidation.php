<?php

declare(strict_types=1);

namespace JuanchoSL\Validators;

class NumberValidation
{

    public static function is(mixed $var): bool
    {
        return is_numeric($var);
    }
    public static function isEmpty(mixed $var): bool
    {
        return empty($var);
    }

    public static function isLengthGreatherThan(string|int $var, int $limit): bool
    {
        return self::is($var) && strlen((string) $var) > $limit;
    }
    public static function isLengthGreatherOrEqualsThan(string|int $var, int $limit): bool
    {
        return self::is($var) && strlen((string) $var) >= $limit;
    }
    public static function isLengthLessThan(string|int $var, int $limit): bool
    {
        return self::is($var) && strlen((string) $var) < $limit;
    }
    public static function isLengthLessOrEqualsThan(string|int $var, int $limit): bool
    {
        return self::is($var) && strlen((string) $var) <= $limit;
    }

    public static function isRegex(string $var, string $expresion): bool
    {
        $results = [];
        preg_match($expresion, $var, $results);
        return !empty($results);
    }

}