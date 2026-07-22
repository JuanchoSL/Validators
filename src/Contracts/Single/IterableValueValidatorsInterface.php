<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

use JuanchoSL\Validators\Types\AbstractValidations;

interface IterableValueValidatorsInterface
{

    /**
     * Check into the iterable value, if the values contains a desired value
     * @param mixed $var The iterable to check
     * @param mixed $needle The value to find into each iterable's values 
     * @return bool Result of the operation
     */
    public static function isValueContaining(mixed $var, mixed $needle): bool;

    /**
     * Check into the iterable value, if the values contains any of desired values
     * @param mixed $var The iterable to check
     * @param mixed $needles The values to find into each iterable's values 
     * @return bool Result of the operation
     */
    public static function isValueContainingAny(mixed $var, mixed ...$needles): bool;

    /**
     * Check into the iterable value, if the values are validating a more complex validation
     * @param mixed $var The iterable to check
     * @param AbstractValidations|callable $needle The validation to call in order to check or each iterable's values 
     * @return bool Result of the operation
     */
    public static function isValueValidating(mixed $var, AbstractValidations|callable $needle): bool;

    /**
     * Check into the iterable value, if the values are validating any of more complex validations
     * @param mixed $var The iterable to check
     * @param AbstractValidations|callable $needles The validations to call in order to check or each iterable's values 
     * @return bool Result of the operation
     */
    public static function isValueValidatingAny(mixed $var, AbstractValidations|callable ...$needles): bool;

}