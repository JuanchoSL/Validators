<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Iterables\IterableValidation;
use JuanchoSL\Validators\Types\Traits\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\ContainsValidationsTrait;
use JuanchoSL\Validators\Types\Traits\LengthValidationsTrait;

class IterableValidations extends AbstractValidations implements BasicValidatorsInterface, LengthValidatorsInterface
{

    use BasicValidationsTrait, ContainsValidationsTrait, LengthValidationsTrait;

    protected string $validator = IterableValidation::class;
/*
    public function isKeyContaining(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isKeyContaining', func_get_args());
    }

    public function isKeyContainingAny(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isKeyContainingAny', func_get_args());
    }*/
}