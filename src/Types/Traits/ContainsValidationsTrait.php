<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits;

trait ContainsValidationsTrait
{

    public function isValueContaining(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isValueContaining', func_get_args());
    }
    public function isValueContainingAny(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isValueContainingAny', func_get_args());
    }
}
