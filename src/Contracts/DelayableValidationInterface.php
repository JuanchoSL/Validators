<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Contracts;

interface DelayableValidationInterface
{

    public function __invoke(mixed $value): bool;
}