<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts\Multi;

interface IterableKeyValidatorsInterface
{

    /**
     * Check for an iterable value, if the desired key is present
     * @param mixed $needle The name to find into keys list names
     * @return static The object to perform more checks
     */
    public function isKeyContaining(mixed $needle): static;

    /**
     * Check for an iterable value, if any desired key is present
     * @param mixed $needles The list names to find into keys list names
     * @return static The object to perform more checks
     */
    public function isKeyContainingAny(mixed ...$needles): static;

}