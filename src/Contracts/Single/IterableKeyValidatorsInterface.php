<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface IterableKeyValidatorsInterface
{

    /**
     * Check for an iterable value, if the keys list names contains a desired name
     * @param mixed $var The iterable to check
     * @param mixed $needle The name to find into keys list names
     * @return bool Result of the operation
     */
    public static function isKeyContaining(mixed $var, mixed $needle): bool;

    /**
     * Check for an iterable value, if the keys list names contains any desired names
     * @param mixed $var The iterable to check
     * @param mixed $needles The list names to find into keys list names
     * @return bool Result of the operation
     */
    public static function isKeyContainingAny(mixed $var, mixed ...$needles): bool;

}