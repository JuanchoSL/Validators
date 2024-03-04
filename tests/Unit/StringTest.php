<?php

namespace JuanchoSL\Validators\Tests\Unit;

use JuanchoSL\Validators\StringValidation;
use PHPUnit\Framework\TestCase;

class StringTest extends TestCase
{
    public function testIsStringTrue()
    {
        $this->assertTrue(StringValidation::is("text string"), "Is a string");
        $this->assertTrue(StringValidation::is(""), "Is a string");
        $this->assertTrue(StringValidation::is(" "), "Is a string");
    }
    public function testIsStringFalse()
    {
        $this->assertFalse(StringValidation::is(123456), "Is not a string");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue(StringValidation::is(""), "Is an empty string");
    }
    public function isEmptyFalse()
    {
        $this->assertFalse(StringValidation::is('string'), "Is not an empty string");
    }

    public function testIsEmailTrue()
    {
        $this->assertTrue(StringValidation::isEmail("juanchosl@hotmail.com"), "Is an email");
    }

    public function testIsEmailFalse()
    {
        $this->assertFalse(StringValidation::isEmail("juanchosl@hotmail"), "Is not an email");
    }

    public function testIsUrlTrue()
    {
        $this->assertTrue(StringValidation::isUrl("http://url.com"), "Is an url");
        $this->assertTrue(StringValidation::isUrl("https://url.com"), "Is an url");
        $this->assertTrue(StringValidation::isUrl("https://www.url.com"), "Is an url");
        $this->assertTrue(StringValidation::isUrl("ftp://ftp.url.com"), "Is an url");
        $this->assertTrue(StringValidation::isUrl("ftps://ftp.url.com"), "Is an url");
    }

    public function testIsUrlFalse()
    {
        $this->assertFalse(StringValidation::isUrl("isnotanurl"), "Is not an url");
    }

    public function testIsDomainTrue()
    {
        $this->assertTrue(StringValidation::isUrl("http://url.com"), "Is a domain");
        $this->assertTrue(StringValidation::isUrl("https://url.com"), "Is a domain");
        $this->assertTrue(StringValidation::isUrl("https://www.url.com"), "Is a domain");
        $this->assertTrue(StringValidation::isUrl("ftp://ftp.url.com"), "Is a domain");
        $this->assertTrue(StringValidation::isUrl("ftps://ftp.url.com"), "Is a domain");
    }

    public function testIsDomainFalse()
    {
        $this->assertFalse(StringValidation::isUrl("www.url.com"), "Is not a domain");
        $this->assertFalse(StringValidation::isUrl("ftp.url.com"), "Is not a domain");
        $this->assertFalse(StringValidation::isUrl("isnotanurl"), "Is not a domain");
    }

    public function testIsMacTrue()
    {
        $this->assertTrue(StringValidation::isMac("00:00:00:00:00:00"), "Is a MAC");
    }

    public function testIsMacFalse()
    {
        $this->assertFalse(StringValidation::isMac("aaa:aaa:aaa:aaa"), "Is not a MAC");
    }

    public function testIsIpV4True()
    {
        $this->assertTrue(StringValidation::isIpV4("192.168.0.1"), "Is an IP v4 ");
    }

    public function testIsIpV4False()
    {
        $this->assertFalse(StringValidation::isIpV4(123456), "Is not an IP v4");
        $this->assertFalse(StringValidation::isIpV4("123456"), "Is not an IP v4");
        $this->assertFalse(StringValidation::isIpV4("192.168.0.256"), "Is not an IP v4");
    }

    public function testIsLengthGreatherThanTrue()
    {
        $this->assertTrue(StringValidation::isLengthGreatherThan("text string", 10), "Is a string with a length greather than 10");
    }

    public function testIsLengthGreatherThanFalse()
    {
        $this->assertFalse(StringValidation::isLengthGreatherThan("text string", 15), "Is not a string with a length greather than 10");
        $this->assertFalse(StringValidation::isLengthGreatherThan("text string", 11), "Is not a string with a length greather than 11");
        $this->assertFalse(StringValidation::isLengthGreatherThan(123456, 10), "Is not a string with a length greather than 10");
    }

    public function testIsLengthGreatherOrEqualsThanTrue()
    {
        $this->assertTrue(StringValidation::isLengthGreatherOrEqualsThan("text string", 10), "Is a string with a length greather than 10");
        $this->assertTrue(StringValidation::isLengthGreatherOrEqualsThan("text string", 11), "Is a string with a length equals than 11");
    }

    public function testIsLengthGreatherOrEqualsThanFalse()
    {
        $this->assertFalse(StringValidation::isLengthGreatherOrEqualsThan("text string", 15), "Is not a string with length greather or equals than 15");
    }

    public function testIsLengthLessOrEqualsThanTrue()
    {
        $this->assertTrue(StringValidation::isLengthLessOrEqualsThan("text string", 15), "Is a string with a length less than 15");
        $this->assertTrue(StringValidation::isLengthLessOrEqualsThan("text string", 11), "Is a string with a length less than 11");
    }

    public function testIsLengthLessOrEqualsThanFalse()
    {
        $this->assertFalse(StringValidation::isLengthLessOrEqualsThan("text string", 10), "Is not a string with length less than 10");
    }

    public function testIsLengthLessThanTrue()
    {
        $this->assertTrue(StringValidation::isLengthLessThan("text string", 15), "Is a string with a length less than 15");
        $this->assertTrue(StringValidation::isLengthLessThan("text string", 12), "Is a string with a length less than 12");
    }

    public function testIsLengthLessThanFalse()
    {
        $this->assertFalse(StringValidation::isLengthLessThan("text string", 10), "Is not a string with length less than 10");
    }
}