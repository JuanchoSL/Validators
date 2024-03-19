<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Numbers;

use JuanchoSL\Validators\Contracts\Multi\RegexValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;

class NumberValidations extends AbstractValidations implements RegexValidatorsInterface, LengthValidatorsInterface
{

    public function is(): static
    {
        $this->tests[] = [
            "class" => NumberValidation::class,
            "method" => 'is',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isEmpty(): static
    {
        $this->tests[] = [
            "class" => NumberValidation::class,
            "method" => 'isEmpty',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isNotEmpty(): static
    {
        $this->tests[] = [
            "class" => NumberValidation::class,
            "method" => 'isNotEmpty',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthGreatherThan(int $limit): static
    {
        $this->tests[] = [
            "class" => NumberValidation::class,
            "method" => 'isLengthGreatherThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthGreatherOrEqualsThan(int $limit): static
    {
        $this->tests[] = [
            "class" => NumberValidation::class,
            "method" => 'isLengthGreatherOrEqualsThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthLessThan(int $limit): static
    {
        $this->tests[] = [
            "class" => NumberValidation::class,
            "method" => 'isLengthLessThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthLessOrEqualsThan(int $limit): static
    {
        $this->tests[] = [
            "class" => NumberValidation::class,
            "method" => 'isLengthLessOrEqualsThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isRegex(string $expresion): static
    {
        $this->tests[] = [
            "class" => NumberValidation::class,
            "method" => 'isRegex',
            "params" => func_get_args()
        ];
        return $this;
    }

}