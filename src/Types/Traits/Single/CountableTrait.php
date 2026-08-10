<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Single;

trait CountableTrait
{
    public static function isEmpty(mixed $var): bool
    {
        return static::isStrict($var) && static::isLengthEqualsThan($var, 0);
    }

    public static function isNotEmpty(mixed $var): bool
    {
        return static::isStrict($var) && !static::isEmpty($var);
    }

    public static function isLengthEqualsThan(mixed $var, int $limit): bool
    {
        return static::isStrict($var) && count($var) == $limit;
    }

    public static function isLengthGreatherThan(mixed $var, int $limit): bool
    {
        return static::isStrict($var) && count($var) > $limit;
    }

    public static function isLengthGreatherOrEqualsThan(mixed $var, int $limit): bool
    {
        return static::isStrict($var) && count($var) >= $limit;
    }

    public static function isLengthLessThan(mixed $var, int $limit): bool
    {
        return static::isStrict($var) && count($var) < $limit;
    }

    public static function isLengthLessOrEqualsThan(mixed $var, int $limit): bool
    {
        return static::isStrict($var) && count($var) <= $limit;
    }
}