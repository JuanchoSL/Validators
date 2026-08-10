<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Multi;

trait HashTypesValidationsTrait
{

    public function isHashMd5(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isHashSha1(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isHashSha256(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isHashSha384(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isHashSha512(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
}
