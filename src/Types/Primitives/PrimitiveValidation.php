<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Primitives;

use JuanchoSL\Validators\Contracts\Single\BasicValidatorsInterface;
use JuanchoSL\Validators\Types\AbstractValidation;

class PrimitiveValidation extends AbstractValidation implements BasicValidatorsInterface
{

    public static function is(mixed $var): bool
    {
        return is_bool($var) || is_null($var);
    }

    /**
     * Check if is a null or false equivalent value (implicit non true)
     * @param mixed $var The value to check
     * @return bool The result of the check
     */
    public static function isEmpty(mixed $var): bool
    {
        return !static::isTrue($var);
    }

    /**
     * Check if is not a null or false equivalent value (implicit true)
     * @param mixed $var The value to check
     * @return bool The result of the check
     */
    public static function isNotEmpty(mixed $var): bool
    {
        return !static::isNull($var) && !static::isFalse($var);
    }

    /**
     * Evaluate if the value received is or can be translated as a true ('true', 'on', 'yes', '1') or false ('false', 'off', 'no', '0') non boolean, or null otherwise
     * @param mixed $var The value to check
     * @return bool The evaluation result
     */
    public static function isBoolEquivalent(mixed $var): bool
    {
        return !is_null($var) && filter_var($var, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE) !== null;
    }

    /**
     * Check if is a real or equivalent true
     * @param mixed $var The value to check
     * @return bool The check result
     */
    public static function isTrue(mixed $var): bool
    {
        return filter_var($var, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE) === true;
    }

    /**
     * Check if is a real or equivalent false
     * @param mixed $var The value to check
     * @return bool The check result
     */
    public static function isFalse(mixed $var): bool
    {
        return filter_var($var, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE) === false;
    }

    /**
     * Check if is a real null or non bool equivalent
     * @param mixed $var The value to check
     * @return bool The check result
     */
    public static function isNull(mixed $var): bool
    {
        return is_null($var) || filter_var($var, FILTER_VALIDATE_BOOL, FILTER_NULL_ON_FAILURE) == null;
    }
}