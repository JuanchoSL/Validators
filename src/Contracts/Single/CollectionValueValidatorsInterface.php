<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Single;

use JuanchoSL\Validators\Types\AbstractValidations;

interface CollectionValueValidatorsInterface
{

    /**
     * Check into the selected key of all elements from the iterable, if some value are validating a more complex validation
     * @param mixed $var The iterable to check
     * @param string $key The key to check
     * @param AbstractValidations|callable $needle The validation to call in order to check for each iterable's values 
     * @return bool Result of the operation
     */
    public static function isAnyValueAttributeValidating(mixed $var, string $key, AbstractValidations|callable $needle): bool;

    /**
     * Check into the selected key of all elements from the iterable, if any value are validating any of more complex validations
     * @param mixed $var The iterable to check
     * @param string $key The key to check
     * @param AbstractValidations|callable $needles The validations to call in order to check or each iterable's values 
     * @return bool Result of the operation
     */
    public static function isAnyValueAttributeValidatingAny(mixed $var, string $key, AbstractValidations|callable ...$needles): bool;

}