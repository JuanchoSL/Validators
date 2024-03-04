<?php

declare(strict_types=1);

namespace JuanchoSL\Validators;

class StringValidation
{

    public static function is(mixed $var): bool
    {
        return is_string($var);
    }
    public static function isEmpty(mixed $var): bool
    {
        return empty($var);
    }

    public static function isLengthGreatherThan(string $var, int $limit): bool
    {
        return strlen($var) > $limit;
    }
    public static function isLengthGreatherOrEqualsThan(string $var, int $limit): bool
    {
        return strlen($var) >= $limit;
    }
    public static function isLengthLessThan(string $var, int $limit): bool
    {
        return strlen($var) < $limit;
    }
    public static function isLengthLessOrEqualsThan(string $var, int $limit): bool
    {
        return strlen($var) <= $limit;
    }

    public static function isEmail(string $var): bool
    {
        if (filter_var($var, FILTER_VALIDATE_EMAIL) === false) {
            return false;
        }
        return true;
    }
    public static function isUrl(string $var): bool
    {
        if (filter_var($var, FILTER_VALIDATE_URL) === false) {
            return false;
        }
        return true;
    }
    public static function isIpV4(string $var): bool
    {
        if (filter_var($var, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) === false) {
            return false;
        }
        return true;
    }
    public static function isIpV6(string $var): bool
    {
        return filter_var($var, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
    public static function isMac(string $var): bool
    {
        if (filter_var($var, FILTER_VALIDATE_MAC) === false) {
            return false;
        }
        return true;
    }
    public static function isDomain(string $var): bool
    {
        if (filter_var($var, FILTER_VALIDATE_DOMAIN) === false) {
            return false;
        }
        return true;
    }
    public static function isRegex(string $var, string $expresion): bool
    {
        $results = [];
        preg_match($expresion, $var, $results);
        return !empty($results);
    }

}