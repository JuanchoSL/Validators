<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Single;

use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Iterables\IterableValidation;

trait CollectionValuesTrait
{

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
        return IterableValidation::isValueValidatingAny($var, ...$needles);
    }

    public static function isAnyValueAttributeValidating(mixed $var, string $index, AbstractValidations|callable $validations): bool
    {
        return static::isAnyValueAttributeValidatingAny($var, $index, $validations);
    }

    public static function isAnyValueAttributeValidatingAny(mixed $var, string $index, AbstractValidations|callable ...$validations): bool
    {
        $var = (array) $var;
        $var = array_column($var, $index);
        return IterableValidation::isAnyValueValidatingAny($var, ...$validations);
    }
}