<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits;

use JuanchoSL\Validators\Types\AbstractValidations;

trait ContainsValidationsTrait
{

    public function isValueContaining(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isValueContaining', func_get_args());
    }
    public function isValueContainingAny(mixed ...$needle): static
    {
        return $this->addTest($this->validator, 'isValueContainingAny', func_get_args());
    }

    public function isValueValidating(AbstractValidations $validations): static
    {
        return $this->addTest($this->validator, 'isValueValidating', func_get_args());
    }

    public function isValueValidatingAny(AbstractValidations ...$validations): static
    {
        return $this->addTest($this->validator, 'isValueValidatingAny', func_get_args());
    }
}
