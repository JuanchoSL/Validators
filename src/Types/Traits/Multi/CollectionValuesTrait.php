<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

trait CollectionValuesTrait
{
    public function isValueValidating(AbstractValidations|callable $needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueValidatingAny(AbstractValidations|callable ...$needles): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueAttributeValidating(string $attribute, AbstractValidations|callable $needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueAttributeValidatingAny(string $attribute, AbstractValidations|callable ...$needles): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isAnyValueAttributeValidating(string $index, AbstractValidations|callable $validations): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isAnyValueAttributeValidatingAny(string $index, AbstractValidations|callable ...$validations): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
}