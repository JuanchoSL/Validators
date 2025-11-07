<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface IterableKeyValidatorsInterface
{

    public static function isKeyContaining(mixed $var, mixed $needle): bool;
    public static function isKeyContainingAny(mixed $var, mixed ...$needles): bool;

}