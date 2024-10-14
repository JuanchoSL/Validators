<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Numbers;

use JuanchoSL\Validators\Contracts\Multi\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\NumberValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\RegexValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;

class NumberValidations extends AbstractValidations implements BasicValidatorsInterface, LengthValidatorsInterface, RegexValidatorsInterface, NumberValueValidatorsInterface
{

    protected $validator = NumberValidation::class;

    public function is(): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'is',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isEmpty(): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isEmpty',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isNotEmpty(): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isNotEmpty',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isValueEqualsThan(int|float $comparator): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isValueEqualsThan',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isValueGreatherThanOrEquals(int|float $comparator): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isValueGreatherThanOrEquals',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isValueGreatherThan(int|float $comparator): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isValueGreatherThan',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isValueLessThan(int|float $comparator): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isValueLessThan',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isValueLessThanOrEquals(int|float $comparator): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isValueLessThanOrEquals',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthEqualsThan(int $limit): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isLengthEqualsThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthGreatherThan(int $limit): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isLengthGreatherThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthGreatherOrEqualsThan(int $limit): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isLengthGreatherOrEqualsThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthLessThan(int $limit): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isLengthLessThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthLessOrEqualsThan(int $limit): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isLengthLessOrEqualsThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isRegex(string $expresion): static
    {
        $this->tests[] = [
            "class" => $this->validator,
            "method" => 'isRegex',
            "params" => func_get_args()
        ];
        return $this;
    }

}