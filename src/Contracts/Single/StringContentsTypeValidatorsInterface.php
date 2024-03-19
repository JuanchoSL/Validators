<?php
declare(strict_types=1);
namespace JuanchoSL\Validators\Contracts\Single;

interface StringContentsTypeValidatorsInterface
{
     /**
     * Check if the passed value validate as email
     * @return bool The result of the check
     */
    public static function isEmail(string|int|float|bool|null $var): bool;
    
     /**
     * Check if the passed value validate as url
     * @return bool The result of the check
     */
    public static function isUrl(string|int|float|bool|null $var): bool;
    
     /**
     * Check if the passed value validate as an IP v4
     * @return bool The result of the check
     */
    public static function isIpV4(string|int|float|bool|null $var): bool;
    
     /**
     * Check if the passed value validate as an IP v6
     * @return bool The result of the check
     */
    public static function isIpV6(string|int|float|bool|null $var): bool;
    
     /**
     * Check if the passed value validate as a MAC
     * @return bool The result of the check
     */
    public static function isMac(string|int|float|bool|null $var): bool;
    
     /**
     * Check if the passed value validate as a domain
     * @return bool The result of the check
     */
    public static function isDomain(string|int|float|bool|null $var): bool;
}