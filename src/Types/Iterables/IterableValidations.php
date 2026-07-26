<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\ValueValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Iterables\IterableValidation;
use JuanchoSL\Validators\Types\Traits\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\ContainsValidationsTrait;
use JuanchoSL\Validators\Types\Traits\LengthValidationsTrait;

class IterableValidations extends AbstractValidations implements BasicValidatorsInterface, LengthValidatorsInterface, IterableKeyValidatorsInterface, ValueValidatorsInterface
{

    use BasicValidationsTrait, ContainsValidationsTrait, LengthValidationsTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = IterableValidation::class;

    public function isKeyContaining(mixed $needle): static
    {
        return $this->addTest($this->validator, 'isKeyContaining', func_get_args());
    }

    public function isKeyContainingAny(mixed ...$needles): static
    {
        return $this->addTest($this->validator, 'isKeyContainingAny', func_get_args());
    }

    public function isValueAttributeValidating(string $index, AbstractValidations|callable $validations): static
    {
        return $this->addTest($this->validator, 'isValueAttributeValidating', func_get_args());
    }

    public function isValueAttributeValidatingAny(string $index, AbstractValidations|callable ...$validations): static
    {
        return $this->addTest($this->validator, 'isValueAttributeValidatingAny', func_get_args());
    }

    public function isAnyValueValidating(AbstractValidations|callable $validations): static
    {
        return $this->addTest($this->validator, 'isAnyValueValidating', func_get_args());
    }

    public function isAnyValueValidatingAny(AbstractValidations|callable ...$validations): static
    {
        return $this->addTest($this->validator, 'isAnyValueValidatingAny', func_get_args());
    }

    public function isAnyValueAttributeValidating(string $index, AbstractValidations|callable $validations): static
    {
        return $this->addTest($this->validator, 'isAnyValueAttributeValidating', func_get_args());
    }

    public function isAnyValueAttributeValidatingAny(string $index, AbstractValidations|callable ...$validations): static
    {
        return $this->addTest($this->validator, 'isAnyValueAttributeValidatingAny', func_get_args());
    }
}