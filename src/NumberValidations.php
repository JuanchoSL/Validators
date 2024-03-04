<?php

declare(strict_types=1);

namespace JuanchoSL\Validators;

class NumberValidations extends AbstractValidations
{

    public function is(): self
    {
        $this->results[__METHOD__] = NumberValidation::is($this->var);
        return $this;
    }
    public function isEmpty(): self
    {
        $this->results[__METHOD__] = NumberValidation::isEmpty($this->var);
        return $this;
    }
    public function isNotEmpty(): self
    {
        $this->results[__METHOD__] = !NumberValidation::isEmpty($this->var);
        return $this;
    }

    public function isLengthGreatherThan(int $limit): self
    {
        $this->results[__METHOD__] = NumberValidation::isLengthGreatherThan($this->var, $limit);
        return $this;
    }
    public function isLengthGreatherOrEqualsThan(int $limit): self
    {
        $this->results[__METHOD__] = NumberValidation::isLengthGreatherOrEqualsThan($this->var, $limit);
        return $this;
    }
    public function isLengthLessThan(int $limit): self
    {
        $this->results[__METHOD__] = NumberValidation::isLengthLessThan($this->var, $limit);
        return $this;
    }
    public function isLengthLessOrEqualsThan(int $limit): self
    {
        $this->results[__METHOD__] = NumberValidation::isLengthLessOrEqualsThan($this->var, $limit);
        return $this;
    }

    public function isRegex(string $expresion): self
    {
        $this->results[__METHOD__] = NumberValidation::isRegex($this->var, $expresion);
        return $this;
    }

}