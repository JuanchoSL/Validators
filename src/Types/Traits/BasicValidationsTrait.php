<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits;

trait BasicValidationsTrait
{

    public function is(): static
    {
        return $this->addTest($this->validator, 'is', func_get_args());
    }

    public function isEmpty(): static
    {
        return $this->addTest($this->validator, 'isEmpty', func_get_args());
    }

    public function isNotEmpty(): static
    {
        return $this->addTest($this->validator, 'isNotEmpty', func_get_args());
    }
}
