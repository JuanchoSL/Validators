<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

interface IterableValueValidatorsInterface
{

    /**
     * Check into the iterable, if each value is validating a more complex validation
     * @param AbstractValidations|callable $needle The validation to call in order to check for each iterable's values 
     * @return static The object to perform more checks
     */
    public function isValueValidating(AbstractValidations|callable $needle): static;

    /**
     * Check into the iterable, if each value is validating any of more complex validation
     * @param AbstractValidations|callable $needles The validation to call in order to check for each iterable's values 
     * @return static The object to perform more checks
     */
    public function isValueValidatingAny(AbstractValidations|callable ...$needles): static;

    /**
     * Check into the iterable, if some value are validating a more complex validation
     * @param AbstractValidations|callable $needle The validation to call in order to check for each iterable's values 
     * @return static The object to perform more checks
     */
    public function isAnyValueValidating(AbstractValidations|callable $needle): static;

    /**
     * Check into the iterable, if any value are validating any of more complex validations
     * @param AbstractValidations|callable $needles The validations to call in order to check or each iterable's values 
     * @return static The object to perform more checks
     */
    public function isAnyValueValidatingAny(AbstractValidations|callable ...$needles): static;

}