<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface IterableKeyValidatorsInterface
{

    /**
     * Check for an iterable value, if the desired key is present
     * @param mixed $var The iterable to check
     * @param mixed $needle The name to find into keys list names
     * @return bool Result of the operation
     */
    public static function isKeyContaining(mixed $var, mixed $needle): bool;

    /**
     * Check for an iterable value, if any desired key is present
     * @param mixed $var The iterable to check
     * @param mixed $needles The list names to find into keys list names
     * @return bool Result of the operation
     */
    public static function isKeyContainingAny(mixed $var, mixed ...$needles): bool;

}