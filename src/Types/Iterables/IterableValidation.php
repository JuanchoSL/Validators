<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\IterableValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Entities\EntityValidation;
use JuanchoSL\Validators\Types\Strings\StringValidation;

class IterableValidation extends AbstractValidation implements BasicValidatorsInterface, LengthValidatorsInterface, IterableKeyValidatorsInterface, IterableValueValidatorsInterface
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

    public static function isValueValidating(mixed $var, AbstractValidations $needle): bool
    {
        if (!static::is($var)) {
            return false;
        }
        $var = (array) $var;
        $results = true;
        foreach ($var as $entity) {
            $result = true;
            if (!$needle->getResult($entity)) {
                return $result = false;
            }
            //$results = ($results && $result);
        }
        return $results;
    }

    public static function isValueValidatingAny(mixed $var, AbstractValidations ...$needles): bool
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
                if ($needle->getResult($entity)) {
                    $sub_result = true;
                }
            }
            $results = ($results && $result && $sub_result);
        }
        return $results;
    }

    public static function isValueAttributeValidating(mixed $var, string $attribute, AbstractValidations $needle): bool
    {
        return static::isValueAttributeValidatingAny($var, $attribute, $needle);
    }

    public static function isValueAttributeValidatingAny(mixed $var, string $attribute, AbstractValidations ...$needles): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
            return false;
        }
        $var = (array) $var;
        $results = true;
        foreach ($var as $entity) {
            $results = EntityValidation::isValueAttributeValidatingAny($entity, $attribute, ...$needles) ? $results : false;
        }
        return $results;
    }
}