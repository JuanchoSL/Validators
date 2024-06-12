<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface BasicValidatorsInterface
{

    /**
     * Check if the passed value has the desired type
     * @param mixed $var The value to check
     * @return bool The result of the check
     */
    public static function is(mixed $var): bool;

    /**
     * Check if the passed value is an empty value
     * @param mixed The value to check
     * @return bool The result of the check
     */
    public static function isEmpty(mixed $var): bool;

    /**
     * Check if the passed value is not an empty value
     * @param mixed The value to check
     * @return bool The result of the check
     */
    public static function isNotEmpty(mixed $var): bool;
}