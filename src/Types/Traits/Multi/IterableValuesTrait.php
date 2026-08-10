<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

trait IterableValuesTrait
{
    public function isValueContaining(mixed $needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueContainingAny(mixed ...$needles): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueValidating(AbstractValidations|callable $needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueValidatingAny(AbstractValidations|callable ...$needles): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isAnyValueValidating(AbstractValidations|callable $validation): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isAnyValueValidatingAny(AbstractValidations|callable ...$validations): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

}