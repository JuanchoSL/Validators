<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Multi;

trait CollectionKeysTrait
{
    public function isKeyContainingAny(mixed ...$needles): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isKeyContaining(mixed $needle): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
}