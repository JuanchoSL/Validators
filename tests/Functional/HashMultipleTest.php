<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Hashes\HashValidations;
use PHPUnit\Framework\TestCase;
use ValueError;

class HashMultipleTest extends TestCase
{
    protected $validator;

    public function setUp(): void
    {
        $this->validator = new HashValidations();
    }
    public function testIsHashAndValidate()
    {
        $string = "Lorem ipsum dolor sit amet consectetur adipiscing elit lobortis, faucibus duis hendrerit sagittis ridiculus volutpat sodales, cursus id nulla platea tellus pulvinar nisi. Neque vel dictumst ut dui felis porta integer ante morbi, fringilla aptent rutrum nulla fermentum nunc condimentum venenatis, scelerisque dignissim augue magna cursus id euismod metus. In potenti arcu fringilla lacinia ornare leo eleifend blandit, phasellus vel habitasse ligula tellus primis diam, tempor pharetra fusce nibh nulla integer mi.";
        $values = [
            "md5",
            "sha1",
            "sha224",
            "sha256",
            "sha384",
            "sha512",
            "sha3-224",
            "sha3-256",
            "sha3-384",
            "sha3-512",
        ];
        $key = "secret";
        foreach ($values as $value) {
            ${"hash_" . $value} = hash_hmac($value, $string, $key);
            ${$value} = hash($value, $string);
        }
        /*
        $hash_md5 = hash_hmac('md5', $string, $key);
        $hash_sha1 = hash_hmac('sha1', $string, $key);
        $hash_sha256 = hash_hmac('sha256', $string, $key);
        $hash_sha384 = hash_hmac('sha384', $string, $key);
        $hash_sha512 = hash_hmac('sha512', $string, $key);

        $md5 = hash('md5', $string);
        $sha1 = hash('sha1', $string);
        $sha256 = hash('sha256', $string);
        $sha384 = hash('sha384', $string);
        $sha512 = hash('sha512', $string);
        */
        $this->assertTrue($this->validator->clear()->isHashMd5()->getResult($hash_md5));
        $this->assertTrue($this->validator->clear()->isHashSha1()->getResult($hash_sha1));
        $this->assertTrue($this->validator->clear()->isHashSha256()->getResult($hash_sha256));
        $this->assertTrue($this->validator->clear()->isHashSha384()->getResult($hash_sha384));
        $this->assertTrue($this->validator->clear()->isHashSha512()->getResult($hash_sha512));
        $this->assertTrue($this->validator->clear()->isHashMd5()->getResult($md5));
        $this->assertTrue($this->validator->clear()->isHashSha1()->getResult($sha1));
        $this->assertTrue($this->validator->clear()->isHashSha256()->getResult($sha256));
        $this->assertTrue($this->validator->clear()->isHashSha384()->getResult($sha384));
        $this->assertTrue($this->validator->clear()->isHashSha512()->getResult($sha512));
        foreach ($values as $algo) {
            $this->assertTrue($this->validator->clear()->isValidatingHash($algo, $string)->getResult(${$algo}), sprintf("Algo %s with value: '%s'", $algo, ${$algo}));
            $this->assertFalse($this->validator->clear()->isValidatingHash($algo, $string . '.')->getResult(${$algo}), sprintf("Algo %s with value: '%s'", $algo, ${$algo}));
            $this->assertFalse($this->validator->clear()->isValidatingHash($algo, $string)->getResult(${"hash_" . $algo}), sprintf("Algo %s with value: '%s'", $algo, ${"hash_" . $algo}));
            //$this->assertTrue($this->validator->clear()->isValidatingHashHmac($algo, $string, $key)->getResult(${"hash_{$algo}"}), sprintf("Algo HMAC %s with value: '%s'", $algo, ${"hash_" . $algo}));
            $this->assertFalse($this->validator->clear()->isValidatingHashHmac($algo, $string . '.', $key)->getResult(${"hash_{$algo}"}), sprintf("Algo HMAC %s with value: '%s'", $algo, ${"hash_" . $algo}));
            }
            /*
            */
    }
    public function testIsHashAndValidateFailure()
    {
        $string = "Lorem ipsum dolor sit amet consectetur adipiscing elit lobortis, faucibus duis hendrerit sagittis ridiculus volutpat sodales, cursus id nulla platea tellus pulvinar nisi. Neque vel dictumst ut dui felis porta integer ante morbi, fringilla aptent rutrum nulla fermentum nunc condimentum venenatis, scelerisque dignissim augue magna cursus id euismod metus. In potenti arcu fringilla lacinia ornare leo eleifend blandit, phasellus vel habitasse ligula tellus primis diam, tempor pharetra fusce nibh nulla integer mi.";
        $values = [
            "me-lo-invento",
        ];
        $key = "secret";
        foreach ($values as $value) {
            $this->expectException(ValueError::class);
            ${"hash_" . $value} = @hash_hmac($value, $string, $key);
            ${$value} = @hash($value, $string);
        }

        foreach ($values as $algo) {
            $this->assertFalse($this->validator->clear()->isValidatingHash($algo, $string)->getResult(${$algo}));
            $this->assertFalse($this->validator->clear()->isValidatingHash($algo, $string . '.')->getResult(${$algo}));
            $this->assertFalse($this->validator->clear()->isValidatingHash($algo, $string)->getResult(${"hash_" . $algo}));
            $this->assertFalse($this->validator->clear()->isValidatingHashHmac($algo, $string, $key)->getResult(${"hash_{$algo}"}));
            $this->assertFalse($this->validator->clear()->isValidatingHashHmac($algo, $string . '.', $key)->getResult(${"hash_{$algo}"}));
        }
    }
}