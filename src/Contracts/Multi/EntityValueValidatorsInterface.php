<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

use JuanchoSL\Validators\Types\AbstractValidations;

interface EntityValueValidatorsInterface
{

    public function isValueAttributeValidating(string $key, AbstractValidations|callable $needle): static;

    public function isValueAttributeValidatingAny(string $key, AbstractValidations|callable ...$needles): static;
}