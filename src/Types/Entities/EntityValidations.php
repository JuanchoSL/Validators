<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Entities;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Traits\BasicValidationsTrait;

class EntityValidations extends AbstractValidations implements BasicValidatorsInterface
{

    use BasicValidationsTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = EntityValidation::class;

    public function isValueAttributeValidating(string $index, AbstractValidations $validations): static
    {
        return $this->addTest($this->validator, 'isValueAttributeValidating', func_get_args());
    }

    public function isValueAttributeValidatingAny(string $index, AbstractValidations ...$validations): static
    {
        return $this->addTest($this->validator, 'isValueAttributeValidatingAny', func_get_args());
    }
}