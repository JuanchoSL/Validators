<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

interface ValueValidatorsInterface
{

    /**
     * Use a complex validation
     * @param AbstractValidations|callable $needle
     * @return static The object
     */
    public function isValueValidating(AbstractValidations|callable $needle): static;
    public function isValueValidatingAny(AbstractValidations|callable ...$needles): static;

}