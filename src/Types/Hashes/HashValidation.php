<?php declare(strict_types=1);

namespace JuanchoSL\Validators\Types\Hashes;

use JuanchoSL\Exceptions\NotImplementedException;
use JuanchoSL\Validators\Types\Strings\StringValidation;

class HashValidation
{
    public static function isValidatingHash(mixed $hash, string $algo, string $string): bool
    {
        $hash = (string) $hash;
        return (static::isHash($hash, $algo) && hash_equals(hash($algo, $string), $hash));
    }
    public static function isValidatingHashHmac(mixed $hash, string $algo, string $string, string $key): bool
    {
        $hash = (string) $hash;
        return (static::isHash($hash, $algo) && hash_equals(hash_hmac($algo, $string, $key), $hash));
    }
    public static function isHash(mixed $var, string $algo_type): bool
    {
        return StringValidation::isHexadecimal($var) && StringValidation::isLengthEqualsThan($var, static::getHashLength($algo_type));
    }
    public static function isHashMd5(mixed $var): bool
    {
        return static::isHash($var, 'md5');
    }
    public static function isHashSha1(mixed $var): bool
    {
        return static::isHash($var, 'sha1');
    }
    public static function isHashSha256(mixed $var): bool
    {
        return static::isHash($var, 'sha256');
    }
    public static function isHashSha384(mixed $var): bool
    {
        return static::isHash($var, 'sha384');
    }
    public static function isHashSha512(mixed $var): bool
    {
        return static::isHash($var, 'sha512');
    }
    protected static function getHashLength(string $algo): int
    {
        $availables = [
            'md5' => 32,
            'sha1' => 40,
            'sha256' => 64,
            'sha384' => 96,
            'sha512' => 128,
        ];
        if (!array_key_exists($algo, $availables)) {
            $algos = hash_algos();
            if (in_array($algo, $algos)) {
                return strlen(hash($algo, 'string'));
            }
            throw new NotImplementedException(sprintf("The '%s' algo is unknowk, check hash_algos() or hash_hmac_algos() for retrieve the supported algos list", $algo));
        }
        return $availables[$algo];
    }
}