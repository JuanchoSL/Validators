<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Primitives;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Traits\BasicValidationsTrait;

class PrimitiveValidations extends AbstractValidations implements BasicValidatorsInterface
{
    use BasicValidationsTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = PrimitiveValidation::class;

    public function isBoolEquivalent(mixed $var): static
    {
        return $this->addTest($this->validator, 'isBoolEquivalent', func_get_args());
    }
    public function isTrue(mixed $var): static
    {
        return $this->addTest($this->validator, 'isTrue', func_get_args());
    }
    public function isFalse(mixed $var): static
    {
        return $this->addTest($this->validator, 'isFalse', func_get_args());
    }
    public function isNull(mixed $var): static
    {
        return $this->addTest($this->validator, 'isNull', func_get_args());
    }
}