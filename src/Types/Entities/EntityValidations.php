<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Entities;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Traits\Multi\BasicValidationsTrait;
use JuanchoSL\Validators\Types\Traits\Multi\CollectionKeysTrait;

class EntityValidations extends AbstractValidations implements
    BasicValidatorsInterface,
    IterableKeyValidatorsInterface
{

    use BasicValidationsTrait, CollectionKeysTrait;

    /**
     * 
     * @var class-string $validator
     */
    protected string $validator = EntityValidation::class;

    public function isValueAttributeValidating(string $index, AbstractValidations|callable $validations): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }

    public function isValueAttributeValidatingAny(string $index, AbstractValidations|callable ...$validations): static
    {
        return $this->addTest($this->validator, __FUNCTION__, func_get_args());
    }
}