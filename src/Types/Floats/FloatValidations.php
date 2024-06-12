<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Floats;

use JuanchoSL\Validators\Types\Numbers\NumberValidations;

class FloatValidations extends NumberValidations
{

    protected $validator = FloatValidation::class;

    public function is(): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'is',
            "params" => func_get_args()
        ];
        return $this;
    }
}