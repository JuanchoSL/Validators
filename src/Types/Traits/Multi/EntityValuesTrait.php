<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

trait EntityValuesTrait
{

    public function isValueAttributeValidating(string $attribute, AbstractValidations|callable $needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueAttributeValidatingAny(string $attribute, AbstractValidations|callable ...$needles): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

}