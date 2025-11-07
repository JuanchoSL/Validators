<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface IterableKeyValidatorsInterface
{

    public function isKeyContaining(mixed $needle): static;
    public function isKeyContainingAny(mixed ...$needles): static;

}