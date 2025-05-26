<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Strings;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\ContentValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\RegexValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\StringContentsTypeValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;

class StringValidation extends AbstractValidation implements BasicValidatorsInterface, LengthValidatorsInterface, RegexValidatorsInterface, StringContentsTypeValidatorsInterface, ContentValidatorsInterface
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

    public static function isValueStartingWith(string|int|float $var, string|int|float $needle): bool
    {
        if (version_compare(PHP_VERSION, '8.0.0', '<') || !function_exists('str_starts_with')) {
            return substr_compare($var, $needle, 0, mb_strlen($needle)) === 0;
        } else {
            return str_starts_with($var, $needle);
        }
    }

    public static function isValueEndingWith(string|int|float $var, string|int|float $needle): bool
    {
        if (version_compare(PHP_VERSION, '8.0.0', '<') || !function_exists('str_ends_with')) {
            return substr_compare($var, $needle, mb_strlen($needle) * -1) === 0;
        } else {
            return str_ends_with($var, $needle);
        }
    }

    public static function isValueContaining(string|int|float $var, string|int|float $needle): bool
    {
        if (version_compare(PHP_VERSION, '8.0.0', '<') || !function_exists('str_contains')) {
            return strpos($var, $needle) !== false;
        } else {
            return str_contains($var, $needle);
        }
    }

    public static function isValueStartingWithAny(string|int|float $var, string|int|float ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueStartingWith($var, $needle)) {
                return true;
            }
        }
        return false;
    }

    public static function isValueEndingWithAny(string|int|float $var, string|int|float ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueEndingWith($var, $needle)) {
                return true;
            }
        }
        return false;
    }

    public static function isValueContainingAny(string|int|float $var, string|int|float ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueContaining($var, $needle)) {
                return true;
            }
        }
        return false;
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
        if (static::isValueEndingWith($value, ';') || static::isValueEndingWith($value, '}')) {
            //    if (in_array(mb_substr($value, -1), ['}', ';'])) {
            return ($value == 'b:0;') ? true : @unserialize($value) !== false;
        }
        return false;
    }
    public static function isRegex(string|int|float $var, string $expresion): bool
    {
        $results = [];
        preg_match($expresion, (string) $var, $results);
        return !empty($results);
    }

}