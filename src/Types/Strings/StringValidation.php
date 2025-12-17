<?php /*declare(strict_types=1);*/

namespace JuanchoSL\Validators\Types\Strings;

use DateTimeImmutable;
use Exception;
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

    public static function isLengthEqualsThan(mixed $var, int $limit): bool
    {
        return mb_strlen((string) strval($var)) == $limit;
    }

    public static function isLengthGreatherThan(mixed $var, int $limit): bool
    {
        return mb_strlen((string) strval($var)) > $limit;
    }
    public static function isLengthGreatherOrEqualsThan(mixed $var, int $limit): bool
    {
        return mb_strlen((string) strval($var)) >= $limit;
    }
    public static function isLengthLessThan(mixed $var, int $limit): bool
    {
        return mb_strlen((string) strval($var)) < $limit;
    }
    public static function isLengthLessOrEqualsThan(mixed $var, int $limit): bool
    {
        return mb_strlen((string) strval($var)) <= $limit;
    }

    public static function isValueStartingWith(mixed $var, mixed $needle): bool
    {
        if (version_compare(PHP_VERSION, '8.0.0', '<') || !function_exists('str_starts_with')) {
            return substr_compare((string) strval($var), $needle, 0, mb_strlen($needle)) === 0;
        } else {
            return str_starts_with((string) strval($var), $needle);
        }
    }

    public static function isValueStartingWithAny(mixed $var, mixed ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueStartingWith((string) strval($var), $needle)) {
                return true;
            }
        }
        return false;
    }

    public static function isValueEndingWith(mixed $var, mixed $needle): bool
    {
        if (version_compare(PHP_VERSION, '8.0.0', '<') || !function_exists('str_ends_with')) {
            return substr_compare((string) strval($var), $needle, mb_strlen($needle) * -1) === 0;
        } else {
            return str_ends_with((string) strval($var), $needle);
        }
    }

    public static function isValueEndingWithAny(mixed $var, mixed ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueEndingWith((string) strval($var), $needle)) {
                return true;
            }
        }
        return false;
    }

    public static function isValueContaining(mixed $var, mixed $needle): bool
    {
        if (version_compare(PHP_VERSION, '8.0.0', '<') || !function_exists('str_contains')) {
            return strpos((string) strval($var), $needle) !== false;
        } else {
            return str_contains((string) strval($var), $needle);
        }
    }

    public static function isValueContainingAny(mixed $var, mixed ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueContaining((string) strval($var), $needle)) {
                return true;
            }
        }
        return false;
    }

    public static function isNumber(mixed $var): bool
    {
        return is_numeric($var);
    }
    public static function isDate(mixed $var): bool
    {
        $date = @date_parse($var);
        return ($date !== false && $date['error_count'] == 0);
        
        try {
            new DateTimeImmutable($var);
            return true;
        } catch (Exception $e) {
            return false;
        }
    }

    public static function isFloat(mixed $var): bool
    {
        return (filter_var((string) strval($var), FILTER_VALIDATE_FLOAT) !== false);
    }
    public static function isInteger(mixed $var): bool
    {
        return (filter_var((string) strval($var), FILTER_VALIDATE_INT) !== false);
    }
    public static function isEmail(mixed $var): bool
    {
        return (filter_var((string) strval($var), FILTER_VALIDATE_EMAIL) !== false);
    }
    public static function isUrl(mixed $var): bool
    {
        return (filter_var((string) strval($var), FILTER_VALIDATE_URL) !== false);
    }
    public static function isIpV4(mixed $var): bool
    {
        return (filter_var((string) strval($var), FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false);
    }
    public static function isIpV6(mixed $var): bool
    {
        return filter_var((string) strval($var), FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }
    public static function isMac(mixed $var): bool
    {
        return (filter_var((string) strval($var), FILTER_VALIDATE_MAC) !== false);
    }
    public static function isDomain(mixed $var): bool
    {
        return (filter_var((string) strval($var), FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME) !== false);
    }

    public static function isSerialized(string $value): bool
    {
        if (static::isValueEndingWith($value, ';') || static::isValueEndingWith($value, '}')) {
            return ($value == 'b:0;') ? true : @unserialize($value) !== false;
        }
        return false;
    }
    public static function isRegex(mixed $var, string $expresion): bool
    {
        $results = [];
        preg_match($expresion, (string) strval($var), $results);
        return !empty($results);
    }

}