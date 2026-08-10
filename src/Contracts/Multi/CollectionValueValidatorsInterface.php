<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

interface CollectionValueValidatorsInterface
{

    public function isValueAttributeValidating(string $key, AbstractValidations|callable $needle): static;

    public function isValueAttributeValidatingAny(string $key, AbstractValidations|callable ...$needles): static;

    /**
     * Check into the selected key of all elements from the iterable, if some value are validating a more complex validation
     * @param string $key The key to check
     * @param AbstractValidations|callable $needle The validation to call in order to check for each iterable's values 
     * @return static The object to perform more checks
     */
    public function isAnyValueAttributeValidating(string $key, AbstractValidations|callable $needle): static;

    /**
     * Check into the selected key of all elements from the iterable, if any value are validating any of more complex validations
     * @param string $key The key to check
     * @param AbstractValidations|callable $needles The validations to call in order to check or each iterable's values 
     * @return static The object to perform more checks
     */
    public function isAnyValueAttributeValidatingAny(string $key, AbstractValidations|callable ...$needles): static;
}