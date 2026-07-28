<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits;

trait HashTypesValidationsTrait
{

    public function isHashMd5(): static
    {
        return $this->addTest($this->validator, 'isHashMd5', func_get_args());
    }
    public function isHashSha1(): static
    {
        return $this->addTest($this->validator, 'isHashSha1', func_get_args());
    }
    public function isHashSha256(): static
    {
        return $this->addTest($this->validator, 'isHashSha256', func_get_args());
    }
    public function isHashSha384(): static
    {
        return $this->addTest($this->validator, 'isHashSha384', func_get_args());
    }
    public function isHashSha512(): static
    {
        return $this->addTest($this->validator, 'isHashSha512', func_get_args());
    }
}
