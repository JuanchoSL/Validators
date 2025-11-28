<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Numbers;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\ContentValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\NumberValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\RegexValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;
use JuanchoSL\Validators\Types\Strings\StringValidation;

class NumberValidation extends AbstractValidation implements BasicValidatorsInterface, LengthValidatorsInterface, RegexValidatorsInterface, NumberValueValidatorsInterface, ContentValidatorsInterface
{

    public static function is(mixed $var): bool
    {
        return is_numeric($var);
    }

    public static function isValueEqualsThan(int|float $var, int|float $comparator): bool
    {
        return $var == $comparator;
    }

    public static function isValueGreatherThanOrEquals(int|float $var, int|float $comparator): bool
    {
        return $var >= $comparator;
    }

    public static function isValueIntoRange(int|float $var, int|float $min, int|float $max): bool
    {
        return static::isValueGreatherThanOrEquals($var, $min) && static::isValueLessThanOrEquals($var, $max);
    }

    public static function isValueGreatherThan(int|float $var, int|float $comparator): bool
    {
        return $var > $comparator;
    }

    public static function isValueLessThanOrEquals(int|float $var, int|float $comparator): bool
    {
        return $var <= $comparator;
    }

    public static function isValueLessThan(int|float $var, int|float $comparator): bool
    {
        return $var < $comparator;
    }

    public static function isLengthEqualsThan(mixed $var, int $limit): bool
    {
        return static::is($var) && mb_strlen((string) strval($var)) == $limit;
    }

    public static function isLengthGreatherThan(mixed $var, int $limit): bool
    {
        return static::is($var) && mb_strlen((string) strval($var)) > $limit;
    }

    public static function isLengthGreatherOrEqualsThan(mixed $var, int $limit): bool
    {
        return static::is($var) && mb_strlen((string) strval($var)) >= $limit;
    }

    public static function isLengthLessThan(mixed $var, int $limit): bool
    {
        return static::is($var) && mb_strlen((string) strval($var)) < $limit;
    }

    public static function isLengthLessOrEqualsThan(mixed $var, int $limit): bool
    {
        return static::is($var) && mb_strlen((string) strval($var)) <= $limit;
    }

    public static function isValueStartingWith(mixed $var, mixed $needle): bool
    {
        return static::is($var) && StringValidation::isValueStartingWith((string) strval($var), (string) strval($needle));
    }

    public static function isValueStartingWithAny(mixed $var, mixed ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueStartingWith($var, $needle)) {
                return true;
            }
        }
        return false;
    }

    public static function isValueEndingWith(mixed $var, mixed $needle): bool
    {
        return static::is($var) && StringValidation::isValueEndingWith((string) strval($var), (string) strval($needle));
    }

    public static function isValueEndingWithAny(mixed $var, mixed ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueEndingWith($var, $needle)) {
                return true;
            }
        }
        return false;
    }

    public static function isValueContaining(mixed $var, mixed $needle): bool
    {
        return static::is($var) && StringValidation::isValueContaining((string) strval($var), (string) strval($needle));
    }

    public static function isValueContainingAny(mixed $var, mixed ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueContaining($var, $needle)) {
                return true;
            }
        }
        return false;
    }

    public static function isRegex(mixed $var, string $expresion): bool
    {
        $results = [];
        preg_match($expresion, (string) $var, $results);
        return !empty($results);
    }

}