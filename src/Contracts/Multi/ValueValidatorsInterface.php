<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

interface ValueValidatorsInterface
{

    /**
     * Use a complex validation
     * @param \JuanchoSL\Validators\Types\AbstractValidations $needle
     * @return static The object
     */
    public function isValueValidating(AbstractValidations $needle): static;
    public function isValueValidatingAny(AbstractValidations ...$needles): static;

}