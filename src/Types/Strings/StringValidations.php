<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Strings;

use JuanchoSL\Validators\Types\AbstractValidations;

class StringValidations extends AbstractValidations
{

    public function is(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::is($this->var);
        return $this;
    }

    public function isEmpty(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isEmpty($this->var);
        return $this;
    }

    public function isNotEmpty(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = !StringValidation::isEmpty($this->var);
        return $this;
    }

    public function isLengthGreatherThan(int $limit): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isLengthGreatherThan($this->var, $limit);
        return $this;
    }
    public function isLengthGreatherOrEqualsThan(int $limit): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isLengthGreatherOrEqualsThan($this->var, $limit);
        return $this;
    }
    public function isLengthLessThan(int $limit): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isLengthLessThan($this->var, $limit);
        return $this;
    }
    public function isLengthLessOrEqualsThan(int $limit): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isLengthLessOrEqualsThan($this->var, $limit);
        return $this;
    }

    public function isEmail(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isEmail($this->var);
        return $this;
    }
    public function isUrl(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isUrl($this->var);
        return $this;
    }
    public function isIpV4(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isIpV4($this->var);
        return $this;
    }
    public function isIpV6(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isIpV6($this->var);
        return $this;
    }
    public function isMac(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isMac($this->var);
        return $this;
    }
    public function isDomain(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isDomain($this->var);
        return $this;
    }
    public function isRegex(string $expresion): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = StringValidation::isRegex($this->var, $expresion);
        return $this;
    }

}