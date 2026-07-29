<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use ArrayIterator;
use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\IterableValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Entities\EntityValidation;
use JuanchoSL\Validators\Types\Strings\StringValidation;

class IterableValidation extends AbstractValidation implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    IterableKeyValidatorsInterface,
    IterableValueValidatorsInterface
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

    public static function isValueContaining(mixed $var, mixed $needle): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
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
        if (!static::is($var) || static::isEmpty($var)) {
            return false;
        }

        $var = (array) $var;
        $results = true;
        foreach ($var as $entity) {
            $results = (StringValidation::isValueContainingAny((string) $entity, ...$needles)) ? $results : false;
        }
        return $results;
    }

    public static function isKeyContainingAny(mixed $var, mixed ...$needles): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
            return false;
        }

        $var = (array) $var;
        $results = true;
        foreach ($var as $key => $entity) {
            $results = (StringValidation::isValueContainingAny((string) $key, ...$needles)) ? $results : false;
        }
        return $results;
    }

    public static function isKeyContaining(mixed $var, mixed $needle): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
            return false;
        }
        $var = (array) $var;
        $results = true;
        foreach ($var as $key => $entity) {
            $result = true;
            if (!StringValidation::isValueContaining((string) $key, (string) strval($needle))) {
                return $result = false;
            }
            //$results = ($results && $result);
        }
        return $results;
    }

    public static function isValueValidating(mixed $var, AbstractValidations|callable $needle): bool
    {
        if (version_compare(PHP_VERSION, '8.4.0', '>=')) {
            return array_all($var, $needle);
        }
        return static::isValueValidatingAny($var, $needle);
    }

    public static function isValueValidatingAny(mixed $var, AbstractValidations|callable ...$needles): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
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

    public static function isValueAttributeValidating(mixed $var, string $attribute, AbstractValidations|callable $needle): bool
    {
        return static::isValueAttributeValidatingAny($var, $attribute, $needle);
    }

    public static function isValueAttributeValidatingAny(mixed $var, string $attribute, AbstractValidations|callable ...$needles): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
            return false;
        }
        $var = (array) $var;
        $var = array_column($var, $attribute);
        return static::isValueValidatingAny($var, ...$needles);

        $results = true;
        foreach ($var as $entity) {
            $results = EntityValidation::isValueAttributeValidatingAny($entity, $attribute, ...$needles) ? $results : false;
        }
        return $results;
    }

    public static function isAnyValueValidating(mixed $var, AbstractValidations|callable $validation): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
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
        if (!static::is($var) || static::isEmpty($var)) {
            return false;
        }
        foreach ($validations as $validation) {
            if (static::isAnyValueValidating($var, $validation)) {
                return true;
            }
        }
        return false;
    }

    public static function isAnyValueAttributeValidating(mixed $var, string $index, AbstractValidations|callable $validations): bool
    {
        return static::isAnyValueAttributeValidatingAny($var, $index, $validations);
    }

    public static function isAnyValueAttributeValidatingAny(mixed $var, string $index, AbstractValidations|callable ...$validations): bool
    {
        $var = (array) $var;
        $var = array_column($var, $index);
        return static::isAnyValueValidatingAny($var, ...$validations);
    }

}