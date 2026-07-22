<?php

namespace JuanchoSL\Validators\Types\Traits;

use JuanchoSL\Validators\Types\AbstractValidations;

trait ContainsValidationsTrait
{

    public function isValueEquals(mixed $comparator): static
    {
        return $this->addTest($this->validator, 'isValueEquals', func_get_args());
    }
    public function isValueEqualsAny(mixed ...$comparator): static
    {
        return $this->addTest($this->validator, 'isValueEqualsAny', func_get_args());
    }

    public function isValueStartingWith(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isValueStartingWith', func_get_args());
    }

    public function isValueStartingWithAny(mixed ...$needles): static
    {
        return $this->addTest($this->validator, 'isValueStartingWithAny', func_get_args());
    }

    public function isValueEndingWith(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isValueEndingWith', func_get_args());
    }

    public function isValueEndingWithAny(mixed ...$needles): static
    {
        return $this->addTest($this->validator, 'isValueEndingWithAny', func_get_args());
    }

    public function isValueContaining(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isValueContaining', func_get_args());
    }
    public function isValueContainingAny(mixed ...$needle): static
    {
        return $this->addTest($this->validator, 'isValueContainingAny', func_get_args());
    }

    public function isValueValidating(AbstractValidations|callable $validations): static
    {
        return $this->addTest($this->validator, 'isValueValidating', func_get_args());
    }

    public function isValueValidatingAny(AbstractValidations|callable ...$validations): static
    {
        return $this->addTest($this->validator, 'isValueValidatingAny', func_get_args());
    }
}
