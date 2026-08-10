<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Traits\Single;

use JuanchoSL\Validators\Types\AbstractValidations;
use JuanchoSL\Validators\Types\Iterables\IterableValidation;

trait EntityValuesTrait
{
    public static function isValueValidating(mixed $var, AbstractValidations|callable $needle): bool
    {
        return static::isValueValidatingAny($var, $needle);
    }

    public static function isValueValidatingAny(mixed $var, AbstractValidations|callable ...$needles): bool
    {
        if (!static::is($var) || static::isEmpty($var)) {
            //return false;
        }
        //echo print_r($var,true);exit;
        return IterableValidation::isValueValidatingAny($var, ...$needles);
        $results = true;
        foreach ($var as $field) {
            $results = IterableValidation::isValueValidatingAny($field, ...$needles) ? $results : false;
        }
        return $results;
    }

}