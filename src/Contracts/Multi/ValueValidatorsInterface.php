<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

interface ValueValidatorsInterface
{

    /**
     * Check if the value is validating a more complex validation
     * @param AbstractValidations|callable $needle The validation to check for the value 
     * @return static The object to perform more checks
     */
    public function isValueValidating(AbstractValidations|callable $needle): static;

    /**
     * Check if the value is validating any of more complex validation
     * @param AbstractValidations|callable $needles The validations to check for the value 
     * @return static The object to perform more checks
     */
    public function isValueValidatingAny(AbstractValidations|callable ...$needles): static;


}