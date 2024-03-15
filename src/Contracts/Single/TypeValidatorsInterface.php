<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface TypeValidatorsInterface
{

    /**
     * Check if the passed value has the desired type
     * @return bool The result of the check
     */
    public static function is(string|int|float|bool|null $var): bool;

    /**
     * Check if the passed value is an empty value
     * @return bool The result of the check
     */
    public static function isEmpty(string|int|float|bool|null $var): bool;

    /**
     * Check if the passed value is not an empty value
     * @return bool The result of the check
     */
    //public static function isNotEmpty(string|int|float|bool|null $var): bool;

    /**
     * Check if the passed value validate a regex expression
     * @return bool The result of the check
     */
    public static function isRegex(string|int|float|bool|null $var, string $expresion): bool;
}