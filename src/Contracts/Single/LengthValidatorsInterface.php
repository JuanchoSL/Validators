<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface LengthValidatorsInterface
{

    /**
     * Check if the assigned value has a length greather than indicated and save the result
     * @return bool The result of the check
     */
    public static function isLengthGreatherThan(string|int|float|bool|null $var, int $limit): bool;

    /**
     * Check if the assigned value has a length greather or equals than indicated and save the result
     * @return bool The result of the check
     */
    public static function isLengthGreatherOrEqualsThan(string|int|float|bool|null $var, int $limit): bool;

    /**
     * Check if the assigned value has a length less than indicated and save the result
     * @return bool The result of the check
     */
    public static function isLengthLessThan(string|int|float|bool|null $var, int $limit): bool;

    /**
     * Check if the assigned value has a length less or equals than indicated and save the result
     * @return bool The result of the check
     */
    public static function isLengthLessOrEqualsThan(string|int|float|bool|null $var, int $limit): bool;

}