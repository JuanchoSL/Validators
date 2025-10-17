<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface ContentValidatorsInterface
{

    /**
     * Check if the assigned value starts with a substring in a case sensitive mode and save the result
     * @param mixed $var The value to check
     * @param mixed $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueStartingWith(mixed $var, mixed $needle): bool;

    /**
     * Check if the assigned value ends with a substring in a case sensitive mode and save the result
     * @param mixed $var The value to check
     * @param mixed $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueEndingWith(mixed $var, mixed $needle): bool;

    /**
     * Check if the assigned value starts contains a substring in a case sensitive mode and save the result
     * @param mixed $var The value to check
     * @param mixed $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueContaining(mixed $var, mixed $needle): bool;

    /**
     * Check if the assigned value starts with a substring in a case sensitive mode and save the result
     * @param mixed $var The value to check
     * @param mixed $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueStartingWithAny(mixed $var, mixed ...$needles): bool;

    /**
     * Check if the assigned value ends with a substring in a case sensitive mode and save the result
     * @param mixed $var The value to check
     * @param mixed $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueEndingWithAny(mixed $var, mixed ...$needles): bool;

    /**
     * Check if the assigned value starts contains a substring in a case sensitive mode and save the result
     * @param mixed $var The value to check
     * @param mixed $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueContainingAny(mixed $var, mixed ...$needles): bool;

}