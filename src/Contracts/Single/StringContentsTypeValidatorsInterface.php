<?php declare(strict_types=1);
namespace JuanchoSL\Validators\Contracts\Single;

interface StringContentsTypeValidatorsInterface
{
    /**
     * Check if the passed value validate as a number
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isNumber(string $var): bool;
    /**
     * Check if the passed value validate as an integer number
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isInteger(string $var): bool;
    /**
     * Check if the passed value validate as a float number
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isFloat(string $var): bool;

    /**
     * Check if the passed value validate as email
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isEmail(string $var): bool;

    /**
     * Check if the passed value validate as url
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isUrl(string $var): bool;

    /**
     * Check if the passed value validate as an IP v4
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isIpV4(string $var): bool;

    /**
     * Check if the passed value validate as an IP v6
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isIpV6(string $var): bool;

    /**
     * Check if the passed value validate as a MAC
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isMac(string $var): bool;

    /**
     * Check if the passed value validate as a domain
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isDomain(string $var): bool;

    /**
     * Check if the passed value validate as a serialized value
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isSerialized(string $var): bool;
}