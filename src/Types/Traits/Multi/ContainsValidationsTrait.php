<?php

namespace JuanchoSL\Validators\Types\Traits\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

trait ContainsValidationsTrait
{

    public function isValueEquals(mixed $comparator): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isValueEqualsAny(mixed ...$comparator): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueStartingWith(mixed $needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueStartingWithAny(mixed ...$needles): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueEndingWith(mixed $needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueEndingWithAny(mixed ...$needles): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueContaining(mixed $needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isValueContainingAny(mixed ...$needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueValidating(AbstractValidations|callable $validations): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueValidatingAny(AbstractValidations|callable ...$validations): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
}
