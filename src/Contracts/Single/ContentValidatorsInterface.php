<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface ContentValidatorsInterface
{

    /**
     * Check if the assigned value starts with a substring in a case sensitive mode and save the result
     * @param string|int|float $var The value to check
     * @param string|int|float $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueStartingWith(string|int|float $var, string|int|float $needle): bool;

    /**
     * Check if the assigned value ends with a substring in a case sensitive mode and save the result
     * @param string|int|float $var The value to check
     * @param string|int|float $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueEndingWith(string|int|float $var, string|int|float $needle): bool;

    /**
     * Check if the assigned value starts contains a substring in a case sensitive mode and save the result
     * @param string|int|float $var The value to check
     * @param string|int|float $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueContaining(string|int|float $var, string|int|float $needle): bool;

    /**
     * Check if the assigned value starts with a substring in a case sensitive mode and save the result
     * @param string|int|float $var The value to check
     * @param string|int|float $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueStartingWithAny(string|int|float $var, string|int|float ...$needles): bool;

    /**
     * Check if the assigned value ends with a substring in a case sensitive mode and save the result
     * @param string|int|float $var The value to check
     * @param string|int|float $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueEndingWithAny(string|int|float $var, string|int|float ...$needles): bool;

    /**
     * Check if the assigned value starts contains a substring in a case sensitive mode and save the result
     * @param string|int|float $var The value to check
     * @param string|int|float $needle The substring to compare
     * @return bool The result of the check
     */
    public static function isValueContainingAny(string|int|float $var, string|int|float ...$needles): bool;

}