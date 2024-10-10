<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

interface NumberValueValidatorsInterface
{

    /**
     * Check if the passed value is equals to
     * @param int|float $var The value to check
     * @param int|float $comparator The comprator
     * @return bool The result of the check
     */
    public static function isValueEqualsThan(int|float $var, int|float $comparator): bool;
    
    /**
     * Check if the passed value is greather than or equals to
     * @param int|float $var The value to check
     * @param int|float $comparator The comprator
     * @return bool The result of the check
     */
    public static function isValueGreatherThanOrEquals(int|float $var, int|float $comparator): bool;
    
    /**
     * Check if the passed value is greather than or equals to
     * @param int|float $var The value to check
     * @param int|float $comparator The comprator
     * @return bool The result of the check
     */
    public static function isValueGreatherThan(int|float $var, int|float $comparator): bool;
    
    /**
     * Check if the passed value is less than or equals to
     * @param int|float $var The value to check
     * @param int|float $comparator The comprator
     * @return bool The result of the check
     */
    public static function isValueLessThanOrEquals(int|float $var, int|float $comparator): bool;
    
    /**
     * Check if the passed value is less than
     * @param int|float $var The value to check
     * @param int|float $comparator The comprator
     * @return bool The result of the check
     */
    public static function isValueLessThan(int|float $var, int|float $comparator): bool;
}