<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Floats;

use JuanchoSL\Validators\Types\Numbers\NumberValidations;

class FloatValidations extends NumberValidations
{

    protected string $validator = FloatValidation::class;

}