<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Iterables;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\CollectionValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\IterableValueValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\IterableKeyValidatorsInterface;
use JuanchoSL\Validators\Contracts\Single\LengthValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;
use JuanchoSL\Validators\Types\Entities\EntityValidations;
use JuanchoSL\Validators\Types\Traits\Single\CollectionKeysTrait;
use JuanchoSL\Validators\Types\Traits\Single\CollectionValuesTrait;
use JuanchoSL\Validators\Types\Traits\Single\CountableTrait;
use JuanchoSL\Validators\Types\Traits\Single\IterableValuesTrait;

class CollectionValidation extends AbstractValidation implements
    BasicValidatorsInterface,
    LengthValidatorsInterface,
    IterableKeyValidatorsInterface,
    IterableValueValidatorsInterface,
    CollectionValueValidatorsInterface
{

    use CountableTrait, CollectionKeysTrait, CollectionValuesTrait, IterableValuesTrait;

    public static function is(mixed $var): bool
    {
        return (new IterableValidations())->is()->isValueValidating((new EntityValidations())->is())->__invoke($var);
        return IterableValidation::is($var) && ListValidation::is($var) && (new IterableValidations())->isValueValidating((new IterableValidations())->is())->__invoke($var);

        $result = false;
        if (is_iterable($var)) {
            if (function_exists('array_all')) {
                $result = array_all((array) $var, function ($v, $k) {
                    return is_iterable($v);
                });
            } else {
                $result = true;
                foreach ($var as $val) {
                    $result = is_iterable($val) && !array_is_list($val) ? $result : false;
                }
            }
        }
        return $result;
    }

}