<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Integers;

use JuanchoSL\Validators\Types\Numbers\NumberValidations;

class IntegerValidations extends NumberValidations
{

    protected string $validator = IntegerValidation::class;

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