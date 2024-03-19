<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Strings;

use JuanchoSL\Validators\Contracts\Multi\RegexValidatorsInterface;
use JuanchoSL\Validators\Contracts\Multi\StringContentsTypeValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Contracts\Multi\LengthValidatorsInterface;

class StringValidations extends AbstractValidations implements RegexValidatorsInterface, LengthValidatorsInterface, StringContentsTypeValidatorsInterface
{

    public function is(): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'is',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isEmpty(): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isEmpty',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isNotEmpty(): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isNotEmpty',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isLengthGreatherThan(int $limit): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isLengthGreatherThan',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isLengthGreatherOrEqualsThan(int $limit): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isLengthGreatherOrEqualsThan',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isLengthLessThan(int $limit): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isLengthLessThan',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isLengthLessOrEqualsThan(int $limit): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isLengthLessOrEqualsThan',
            "params" => func_get_args()
        ];
        return $this;
    }

    public function isEmail(): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isEmail',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isUrl(): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isUrl',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isIpV4(): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isIpV4',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isIpV6(): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isIpV6',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isMac(): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isMac',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isDomain(): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isDomain',
            "params" => func_get_args()
        ];
        return $this;
    }
    public function isRegex(string $expresion): static
    {
        $this->tests[] = [
            "class" => StringValidation::class,
            "method" => 'isRegex',
            "params" => func_get_args()
        ];
        return $this;
    }

}