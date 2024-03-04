<?php

declare(strict_types=1);

namespace JuanchoSL\Validators;

class StringValidations extends AbstractValidations
{

    public function is(): self
    {
        $this->results[__METHOD__] = StringValidation::is($this->var);
        return $this;
    }
    public function isEmpty(): self
    {
        $this->results[__METHOD__] = StringValidation::isEmpty($this->var);
        return $this;
    }
    public function isNotEmpty(): self
    {
        $this->results[__METHOD__] = !StringValidation::isEmpty($this->var);
        return $this;
    }

    public function isLengthGreatherThan(int $limit): self
    {
        $this->results[__METHOD__] = StringValidation::isLengthGreatherThan($this->var, $limit);
        return $this;
    }
    public function isLengthGreatherOrEqualsThan(int $limit): self
    {
        $this->results[__METHOD__] = StringValidation::isLengthGreatherOrEqualsThan($this->var, $limit);
        return $this;
    }
    public function isLengthLessThan(int $limit): self
    {
        $this->results[__METHOD__] = StringValidation::isLengthLessThan($this->var, $limit);
        return $this;
    }
    public function isLengthLessOrEqualsThan(int $limit): self
    {
        $this->results[__METHOD__] = StringValidation::isLengthLessOrEqualsThan($this->var, $limit);
        return $this;
    }

    public function isEmail(): self
    {
        $this->results[__METHOD__] = StringValidation::isEmail($this->var);
        return $this;
    }
    public function isUrl(): self
    {
        $this->results[__METHOD__] = StringValidation::isUrl($this->var);
        return $this;
    }
    public function isIpV4(): self
    {
        $this->results[__METHOD__] = StringValidation::isIpV4($this->var);
        return $this;
    }
    public function isIpV6(): self
    {
        $this->results[__METHOD__] = StringValidation::isIpV6($this->var);
        return $this;
    }
    public function isMac(): self
    {
        $this->results[__METHOD__] = StringValidation::isMac($this->var);
        return $this;
    }
    public function isDomain(): self
    {
        $this->results[__METHOD__] = StringValidation::isDomain($this->var);
        return $this;
    }
    public function isRegex(string $expresion): self
    {
        $this->results[__METHOD__] = StringValidation::isRegex($this->var, $expresion);
        return $this;
    }

}