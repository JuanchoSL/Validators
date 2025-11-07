<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits;

trait LengthValidationsTrait
{

    public function isLengthEqualsThan(int $limit): static
    {
        return $this->addTest($this->validator, 'isLengthEqualsThan', func_get_args());
    }

    public function isLengthGreatherThan(int $limit): static
    {
        return $this->addTest($this->validator, 'isLengthGreatherThan', func_get_args());
    }
    public function isLengthGreatherOrEqualsThan(int $limit): static
    {
        return $this->addTest($this->validator, 'isLengthGreatherOrEqualsThan', func_get_args());
    }
    public function isLengthLessThan(int $limit): static
    {
        return $this->addTest($this->validator, 'isLengthLessThan', func_get_args());
    }
    public function isLengthLessOrEqualsThan(int $limit): static
    {
        return $this->addTest($this->validator, 'isLengthLessOrEqualsThan', func_get_args());
    }
}
