<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Numbers;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\ContentValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\NumberValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\RegexValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\Traits\Multi\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\ContainsValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\LengthValidationsTrait;

class NumberValidations extends AbstractValidations implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    RegexValidatorsInterface,
    NumberValueValidatorsInterface,
    ContentValidatorsInterface
{

    use BasicValidationsTrait, LengthValidationsTrait, ContainsValidationsTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = NumberValidation::class;

    public function isValueEqualsThan(int|float $comparator): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isValueEqualsThanAny(int|float ...$comparators): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isValueIntoRange(int|float $min, int|float $max): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isValueGreatherThanOrEquals(int|float $comparator): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isValueGreatherThan(int|float $comparator): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isValueLessThan(int|float $comparator): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isValueLessThanOrEquals(int|float $comparator): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
    public function isRegex(string $expresion): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

}