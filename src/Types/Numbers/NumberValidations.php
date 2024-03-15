<?php

declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Numbers;

use JuanchoSL\Validators\Types\AbstractValidations;

class NumberValidations extends AbstractValidations
{

    public function is(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = NumberValidation::is($this->var);
        return $this;
    }

    public function isEmpty(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = NumberValidation::isEmpty($this->var);
        return $this;
    }

    public function isNotEmpty(): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = !NumberValidation::isEmpty($this->var);
        return $this;
    }


    public function isLengthGreatherThan(int $limit): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = NumberValidation::isLengthGreatherThan($this->var, $limit);
        return $this;
    }

    public function isLengthGreatherOrEqualsThan(int $limit): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = NumberValidation::isLengthGreatherOrEqualsThan($this->var, $limit);
        return $this;
    }

    public function isLengthLessThan(int $limit): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = NumberValidation::isLengthLessThan($this->var, $limit);
        return $this;
    }

    public function isLengthLessOrEqualsThan(int $limit): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = NumberValidation::isLengthLessOrEqualsThan($this->var, $limit);
        return $this;
    }

    public function isRegex(string $expresion): self
    {
        $key = call_user_func_array([$this, 'createKey'], array_merge([__FUNCTION__], func_get_args()));
        $key = !is_string($key) ? __FUNCTION__ : $key;
        $this->results[$key] = NumberValidation::isRegex($this->var, $expresion);
        return $this;
    }

}