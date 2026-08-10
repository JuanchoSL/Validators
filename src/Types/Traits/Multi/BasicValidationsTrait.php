<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Multi;

trait BasicValidationsTrait
{

    public function is(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isEmpty(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isNotEmpty(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
}
