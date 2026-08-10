<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Multi;

trait LengthValidationsTrait
{

    public function isLengthEqualsThan(int $limit): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isLengthGreatherThan(int $limit): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isLengthGreatherOrEqualsThan(int $limit): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isLengthLessThan(int $limit): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isLengthLessOrEqualsThan(int $limit): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
}
