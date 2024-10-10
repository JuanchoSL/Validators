<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Strings;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\RegexValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\StringContentsTypeValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;

class StringValidation extends AbstractValidation implements BasicValidatorsInterface, LengthValidatorsInterface, RegexValidatorsInterface, StringContentsTypeValidatorsInterface
{

    public static function is(mixed $var): bool
    {
        return is_string($var);
    }

    public static function isLengthEqualsThan(string|int|float $var, int $limit): bool
    {
        return mb_strlen((string) $var) == $limit;
    }

    public static function isLengthGreatherThan(string|int|float $var, int $limit): bool
    {
        return mb_strlen((string) $var) > $limit;
    }
    public static function isLengthGreatherOrEqualsThan(string|int|float $var, int $limit): bool
    {
        return mb_strlen((string) $var) >= $limit;
    }
    public static function isLengthLessThan(string|int|float $var, int $limit): bool
    {
        return mb_strlen((string) $var) < $limit;
    }
    public static function isLengthLessOrEqualsThan(string|int|float $var, int $limit): bool
    {
        return mb_strlen((string) $var) <= $limit;
    }

    public static function isEmail(string|int|float $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_EMAIL) !== false);
    }
    public static function isUrl(string|int|float $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_URL) !== false);
    }
    public static function isIpV4(string|int|float $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false);
    }
    public static function isIpV6(string|int|float $var): bool
    {
        return filter_var($var, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
    public static function isMac(string|int|float $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_MAC) !== false);
    }
    public static function isDomain(string|int|float $var): bool
    {
        return (filter_var($var, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME) !== false);
    }

    public static function isSerialized(string $value): bool
    {
        if ($value != 'b:0;') {
            $value = @unserialize($value);
        }
        return ($value !== false);
        return !empty(preg_match('/^([C|O|a|i|s]+):\d+(:("\w+":\d+:)?([\\\s\w\d:"{};*.]+))?/', $value));
    }
    public static function isRegex(string|int|float $var, string $expresion): bool
    {
        $results = [];
        preg_match($expresion, (string) $var, $results);
        return !empty($results);
    }

}