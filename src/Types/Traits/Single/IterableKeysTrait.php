<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Single;

use JuanchoSL\Validators\Types\Strings\StringValidation;

trait IterableKeysTrait
{
    public static function isKeyContainingAny(mixed $var, mixed ...$needles): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
            return false;
        }

        $var = (array) $var;
        foreach ($var as $key => $entity) {
            if(StringValidation::isValueEqualsAny((string) $key, ...$needles)){
                return true;
            }
        }
        return false;
    }

    public static function isKeyContaining(mixed $var, mixed $needle): bool
    {
        return static::isKeyContainingAny($var, $needle);
    }
}