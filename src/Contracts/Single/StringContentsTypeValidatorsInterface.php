<?php declare(strict_types=1);
namespace JuanchoSL\Validators\Contracts\Single;

interface StringContentsTypeValidatorsInterface
{
    /**
     * Check if the passed value validate as a string date
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isDate(string $var): bool;
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
     * Check if the passed value is a binary string
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isBinary(string $var): bool;
    /**
     * Check if the passed value is a hex string
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isHexadecimal(string $var): bool;
    /**
     * Check if the passed value is a multibyte string
     * @param string $var The value to check
     * @return bool The result of the check
     */
    public static function isMultibyte(string $var): bool;

    /**
     * Check if the passed value validate with proposed encoding
     * @param string $var The value to check
     * @param array|string $encoding The encoding/s to check
     * @param bool $strict True for check the real encondg or false to check if it is equivalent with the actual encoding
     * @return bool The result of the check
     */
    public static function isEncodedAs(string $var, array|string $encoding, bool $strict = true): bool;

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