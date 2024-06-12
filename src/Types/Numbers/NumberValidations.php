<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Numbers;

use JuanchoSL\Validators\Contracts\Multi\RegexValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;

class NumberValidations extends AbstractValidations implements RegexValidatorsInterface, LengthValidatorsInterface
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