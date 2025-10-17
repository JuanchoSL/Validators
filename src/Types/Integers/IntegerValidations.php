<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Integers;

use JuanchoSL\Validators\Types\Numbers\NumberValidations;

class IntegerValidations extends NumberValidations
{

    protected string $validator = IntegerValidation::class;

}