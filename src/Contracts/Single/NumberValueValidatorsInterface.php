<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface NumberValueValidatorsInterface
{

    /**
     * Check if the passed value is equals to
     * @param int|float $var The value to check
     * @param int|float $comparator The comparator
     * @return bool The result of the check
     */
    public static function isValueEqualsThan(int|float $var, int|float $comparator): bool;


    /**
     * Check if the passed value is into range, included limits, same as (greater or equals than and less or equals than)
     * @param int|float $var The value to check
     * @param int|float $min The min limit
     * @param int|float $max The max limit
     * @return bool The result of the check
     */
    public static function isValueIntoRange(int|float $var, int|float $min, int|float $max): bool;
    /**
     * Check if the passed value is greather than or equals to
     * @param int|float $var The value to check
     * @param int|float $comparator The comparator
     * @return bool The result of the check
     */
    public static function isValueGreatherThanOrEquals(int|float $var, int|float $comparator): bool;

    /**
     * Check if the passed value is greather than or equals to
     * @param int|float $var The value to check
     * @param int|float $comparator The comparator
     * @return bool The result of the check
     */
    public static function isValueGreatherThan(int|float $var, int|float $comparator): bool;

    /**
     * Check if the passed value is less than or equals to
     * @param int|float $var The value to check
     * @param int|float $comparator The comparator
     * @return bool The result of the check
     */
    public static function isValueLessThanOrEquals(int|float $var, int|float $comparator): bool;

    /**
     * Check if the passed value is less than
     * @param int|float $var The value to check
     * @param int|float $comparator The comparator
     * @return bool The result of the check
     */
    public static function isValueLessThan(int|float $var, int|float $comparator): bool;
}