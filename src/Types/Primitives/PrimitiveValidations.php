<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Primitives;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Traits\Multi\BasicValidationsTrait;

class PrimitiveValidations extends AbstractValidations implements BasicValidatorsInterface
{
    use BasicValidationsTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = PrimitiveValidation::class;

    public function isBoolEquivalent(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isTrue(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isFalse(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isNull(): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
}