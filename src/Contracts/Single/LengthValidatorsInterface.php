<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface LengthValidatorsInterface
{

    /**
     * Check if the assigned value has a length equals than indicated and save the result
     * @param mixed $var The value to check
     * @param int $limit The limit to count
     * @return bool The result of the check
     */
    public static function isLengthEqualsThan(mixed $var, int $limit): bool;

    /**
     * Check if the assigned value has a length greather than indicated and save the result
     * @param mixed $var The value to check
     * @param int $limit The limit to count
     * @return bool The result of the check
     */
    public static function isLengthGreatherThan(mixed $var, int $limit): bool;

    /**
     * Check if the assigned value has a length greather or equals than indicated and save the result
     * @param mixed $var The value to check
     * @param int $limit The limit to count
     * @return bool The result of the check
     */
    public static function isLengthGreatherOrEqualsThan(mixed $var, int $limit): bool;

    /**
     * Check if the assigned value has a length less than indicated and save the result
     * @param mixed $var The value to check
     * @param int $limit The limit to count
     * @return bool The result of the check
     */
    public static function isLengthLessThan(mixed $var, int $limit): bool;

    /**
     * Check if the assigned value has a length less or equals than indicated and save the result
     * @param mixed $var The value to check
     * @param int $limit The limit to count
     * @return bool The result of the check
     */
    public static function isLengthLessOrEqualsThan(mixed $var, int $limit): bool;

}