<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;
use JuanchoSL\Validators\Types\Strings\StringValidation;

class IterableValidation extends AbstractValidation implements BasicValidatorsInterface, LengthValidatorsInterface
{

    public static function is(mixed $var): bool
    {
        return is_iterable($var);
    }
    public static function isEmpty(mixed $var): bool
    {
        return parent::isEmpty($var) || count($var) == 0;
    }

    public static function isNotEmpty(mixed $var): bool
    {
        return !static::isEmpty($var);
    }
    public static function isLengthEqualsThan(mixed $var, int $limit): bool
    {
        return static::is($var) && count($var) == $limit;
    }

    public static function isLengthGreatherThan(mixed $var, int $limit): bool
    {
        return static::is($var) && count($var) > $limit;
    }
    public static function isLengthGreatherOrEqualsThan(mixed $var, int $limit): bool
    {
        return static::is($var) && count($var) >= $limit;
    }
    public static function isLengthLessThan(mixed $var, int $limit): bool
    {
        return static::is($var) && count($var) < $limit;
    }
    public static function isLengthLessOrEqualsThan(mixed $var, int $limit): bool
    {
        return static::is($var) && count($var) <= $limit;
    }

    public static function isValueContaining(mixed $var, string|int|float $needle): bool
    {
        $results = true;
        foreach ($var as $entity) {
            $result = true;
            if (!StringValidation::isValueContaining((string) $entity, (string) $needle)) {
                $result = false;
            }
            $results = ($results && $result);
        }
        return $results ?? false;
    }

    public static function isValueContainingAny(mixed $var, mixed ...$needles): bool
    {
        $results = true;
        foreach ($var as $entity) {
            $results = (StringValidation::isValueContainingAny((string) $entity, ...$needles)) ? $results : false;
        }
        return $results;
    }

    public static function isKeyContainingAny(mixed $var, mixed ...$needles): bool
    {
        $results = true;
        foreach ($var as $key => $entity) {
            $results = (StringValidation::isValueContainingAny((string) $key, ...$needles)) ? $results : false;
        }
        return $results;
    }

    public static function isKeyContaining(mixed $var, string|int|float $needle): bool
    {
        $results = true;
        foreach ($var as $key => $entity) {
            $result = true;
            if (!StringValidation::isValueContaining((string) $key, (string) $needle)) {
                $result = false;
            }
            $results = ($results && $result);
        }
        return $results ?? false;
    }

}