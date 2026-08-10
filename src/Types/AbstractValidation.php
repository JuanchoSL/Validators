<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types;

use JuanchoSL\Exceptions\PreconditionFailedException;

abstract class AbstractValidation
{

    protected static function isStrict(mixed $var): bool
    {
        return static::is($var) or throw new PreconditionFailedException("The checked element does not have the rigth type");
    }

    abstract public static function is(mixed $var): bool;
    
    public static function isEmpty(mixed $var): bool
    {
        return empty($var);
    }

    public static function isNotEmpty(mixed $var): bool
    {
        return !empty($var);
    }

    public static function isValueEquals(mixed $var, mixed $needle): bool
    {
        return ($var == $needle);
    }

    public static function isValueEqualsAny(mixed $var, mixed ...$needles): bool
    {
        foreach ($needles as $needle) {
            if (static::isValueEquals($var, $needle)) {
                return true;
            }
        }
        return false;
    }
}