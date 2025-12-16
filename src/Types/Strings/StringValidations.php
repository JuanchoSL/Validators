<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Strings;

use JuanchoSL\Validators\Contracts\Multi\ContentValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\RegexValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\StringContentsTypeValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\Traits\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\ContainsValidationsTrait;
use JuanchoSL\Validators\Types\Traits\LengthValidationsTrait;

class StringValidations extends AbstractValidations implements BasicValidatorsInterface, RegexValidatorsInterface, LengthValidatorsInterface, StringContentsTypeValidatorsInterface, ContentValidatorsInterface
{

    use BasicValidationsTrait, LengthValidationsTrait, ContainsValidationsTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = StringValidation::class;

    public function isValueEquals(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isValueEquals', func_get_args());
    }
    public function isValueEqualsAny(mixed ...$needle): static
    {
        return $this->addTest($this->validator, 'isValueEqualsAny', func_get_args());
    }

    public function isValueStartingWith(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isValueStartingWith', func_get_args());
    }

    public function isValueStartingWithAny(mixed ...$needles): static
    {
        return $this->addTest($this->validator, 'isValueStartingWithAny', func_get_args());
    }

    public function isValueEndingWith(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isValueEndingWith', func_get_args());
    }

    public function isValueEndingWithAny(mixed ...$needles): static
    {
        return $this->addTest($this->validator, 'isValueEndingWithAny', func_get_args());
    }

    public function isNumber(): static
    {
        return $this->addTest($this->validator, 'isNumber', func_get_args());
    }
    public function isInteger(): static
    {
        return $this->addTest($this->validator, 'isInteger', func_get_args());
    }
    public function isFloat(): static
    {
        return $this->addTest($this->validator, 'isFloat', func_get_args());
    }
    public function isEmail(): static
    {
        return $this->addTest($this->validator, 'isEmail', func_get_args());
    }
    public function isUrl(): static
    {
        return $this->addTest($this->validator, 'isUrl', func_get_args());
    }
    public function isIpV4(): static
    {
        return $this->addTest($this->validator, 'isIpV4', func_get_args());
    }
    public function isIpV6(): static
    {
        return $this->addTest($this->validator, 'isIpV6', func_get_args());
    }
    public function isMac(): static
    {
        return $this->addTest($this->validator, 'isMac', func_get_args());
    }
    public function isDomain(): static
    {
        return $this->addTest($this->validator, 'isDomain', func_get_args());
    }
    public function isSerialized(): static
    {
        return $this->addTest($this->validator, 'isSerialized', func_get_args());
    }
    public function isRegex(string $expresion): static
    {
        return $this->addTest($this->validator, 'isRegex', func_get_args());
    }

}