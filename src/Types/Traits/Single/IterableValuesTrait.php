<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Single;

use ArrayIterator;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Strings\StringValidation;

trait IterableValuesTrait
{
    public static function isValueContaining(mixed $var, mixed $needle): bool
    {
        if (!static::is($var)) {
            return false;
        }

        $var = (array) $var;
        $results = true;
        foreach ($var as $entity) {
            $result = true;
            if (!StringValidation::isValueContaining((string) strval($entity), (string) strval($needle))) {
                return $result = false;
            }
            $results = ($results && $result);
        }
        return $results;
    }

    public static function isValueContainingAny(mixed $var, mixed ...$needles): bool
    {
        if (!static::is($var)) {
            return false;
        }

        $var = (array) $var;
        $results = true;
        foreach ($var as $entity) {
            $results = (StringValidation::isValueContainingAny((string) $entity, ...$needles)) ? $results : false;
        }
        return $results;
    }

    public static function isValueValidating(mixed $var, AbstractValidations|callable $needle): bool
    {
        if (version_compare(PHP_VERSION, '8.4.0', '>=')) {
            return static::is($var) && array_all($var, $needle);
        }
        return static::isValueValidatingAny($var, $needle);
    }

    public static function isValueValidatingAny(mixed $var, AbstractValidations|callable ...$needles): bool
    {
        if (!static::is($var)) {
            return false;
        }
        $var = (array) $var;
        $results = true;
        foreach ($var as $entity) {
            $result = true;
            $sub_result = false;
            foreach ($needles as $needle) {
                if ($needle($entity)) {
                    $sub_result = true;
                }
            }
            $results = ($results && $result && $sub_result);
        }
        return $results;
    }

    public static function isAnyValueValidating(mixed $var, AbstractValidations|callable $validation): bool
    {
        if (!static::is($var)) {
            return false;
        }
        if (version_compare(PHP_VERSION, '8.4.0', '>=')) {
            return array_any($var, $validation);
        }
        $var = new ArrayIterator($var);
        $oks = true;
        iterator_apply($var, function ($a, $validation, &$oks) {
            foreach ($a as $e) {
                if (call_user_func($validation, $e)) {
                    return $oks = false;
                }
            }
            return true;
        }, [$var, $validation, &$oks]);
        return !$oks;
    }

    public static function isAnyValueValidatingAny(mixed $var, AbstractValidations|callable ...$validations): bool
    {
        if (!static::is($var)) {
            return false;
        }
        foreach ($validations as $validation) {
            if (static::isAnyValueValidating($var, $validation)) {
                return true;
            }
        }
        return false;
    }
}