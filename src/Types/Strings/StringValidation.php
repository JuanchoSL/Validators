<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Strings;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\RegexValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\StringContentsTypeValidatorsInterface;

class StringValidation implements BasicValidatorsInterface, LengthValidatorsInterface, RegexValidatorsInterface, StringContentsTypeValidatorsInterface
{

    public static function is(string|int|float|bool|null $var): bool
    {
        return is_string($var);
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
        return strlen((string) $var) > $limit;
    }
    public static function isLengthGreatherOrEqualsThan(string|int|float|bool|null $var, int $limit): bool
    {
        return strlen((string) $var) >= $limit;
    }
    public static function isLengthLessThan(string|int|float|bool|null $var, int $limit): bool
    {
        return strlen((string) $var) < $limit;
    }
    public static function isLengthLessOrEqualsThan(string|int|float|bool|null $var, int $limit): bool
    {
        return strlen((string) $var) <= $limit;
    }

    public static function isEmail(string|int|float|bool|null $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_EMAIL) !== false);
    }
    public static function isUrl(string|int|float|bool|null $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_URL) !== false);
    }
    public static function isIpV4(string|int|float|bool|null $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false);
    }
    public static function isIpV6(string|int|float|bool|null $var): bool
    {
        return filter_var($var, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
    public static function isMac(string|int|float|bool|null $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_MAC) !== false);
    }
    public static function isDomain(string|int|float|bool|null $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME) !== false);
    }

    public static function isRegex(string|int|float|bool|null $var, string $expresion): bool
    {
        $results = [];
        preg_match($expresion, (string) $var, $results);
        return !empty ($results);
    }

}