<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Single;

use JuanchoSL\Validators\Types\Iterables\IterableValidation;

trait CollectionKeysTrait
{
    public static function isKeyContainingAny(mixed $var, mixed ...$needles): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
            return false;
        }
        $results = true;
        foreach ($var as $key => $entity) {
            $results = (IterableValidation::isKeyContainingAny($entity, ...$needles)) ? $results : false;
        }
        return $results;
    }

    public static function isKeyContaining(mixed $var, mixed $needle): bool
    {
        return static::isKeyContainingAny($var, $needle);
    }
}