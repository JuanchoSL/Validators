<?php

namespace JuanchoSL\Validators\Tests\Unit;


use JuanchoSL\Validators\Types\Strings\StringValidation;
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
        $this->assertFalse(StringValidation::is(false), "Is not a string");
        $this->assertFalse(StringValidation::is(true), "Is not a string");
        $this->assertFalse(StringValidation::is(null), "Is not a string");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue(StringValidation::isEmpty(""), "Is an empty string");
        $this->assertTrue(StringValidation::isEmpty(null), "Is an empty string");
        $this->assertTrue(StringValidation::isEmpty(false), "Is an empty string");
    }
    public function testIsEmptyFalse()
    {
        $this->assertFalse(StringValidation::isEmpty('string'), "Is not an empty string");
    }
    public function testIsNotEmptyTrue()
    {
        $this->assertTrue(StringValidation::isNotEmpty('string'), "Is not an empty string");
    }
    public function testIsNotEmptyFalse()
    {
        $this->assertFalse(StringValidation::isNotEmpty(""), "Is an empty string");
        $this->assertFalse(StringValidation::isNotEmpty(null), "Is an empty string");
        $this->assertFalse(StringValidation::isNotEmpty(false), "Is an empty string");
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
        $this->assertTrue(StringValidation::isUrl("https://www.url.com/index.php"), "Is an url");
    }

    public function testIsUrlFalse()
    {
        $this->assertFalse(StringValidation::isUrl("isnotanurl"), "Is not an url");
        $this->assertFalse(StringValidation::isUrl("www.url.com"), "Is not an url");
    }

    public function testIsDomainTrue()
    {
        $this->assertTrue(StringValidation::isDomain("com"), "Is a domain");
        $this->assertTrue(StringValidation::isDomain("url.com"), "Is a domain");
        $this->assertTrue(StringValidation::isDomain("www.url.com"), "Is a domain");
        $this->assertTrue(StringValidation::isDomain("ftp.url.com"), "Is a domain");
        $this->assertTrue(StringValidation::isDomain("ftp.url.com"), "Is a domain");
    }

    public function testIsDomainFalse()
    {
        $this->assertFalse(StringValidation::isDomain("http://isnotanurl"), "Is not a domain");
        $this->assertFalse(StringValidation::isDomain("ftp://ftp.url.com"), "Is not a domain");
        $this->assertFalse(StringValidation::isDomain("ftps://ftp.url.com"), "Is not a domain");
        $this->assertFalse(StringValidation::isDomain("www.url.com/index.html"), "Is not a domain");
    }

    public function testIsMacTrue()
    {
        $this->assertTrue(StringValidation::isMac("00:00:00:00:00:00"), "Is a MAC");
        $this->assertTrue(StringValidation::isMac("00-00-00-00-00-00"), "Is a MAC");
        $this->assertTrue(StringValidation::isMac("f0:00:00:00:00:00"), "Is a MAC");
        $this->assertTrue(StringValidation::isMac("F0-00-00-00-00-00"), "Is a MAC");
    }

    public function testIsMacFalse()
    {
        $this->assertFalse(StringValidation::isMac("aaa:aaa:aaa:aaa"), "Is not a MAC");
        $this->assertFalse(StringValidation::isMac("G0:00:00:00:00:00"), "Is not a MAC");
        $this->assertFalse(StringValidation::isMac("G0-00-00-00-00-00"), "Is not a MAC");
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

    public function testIsIpV6True()
    {
        $this->assertTrue(StringValidation::isIpV6("0000::0000:0000:0000:0000"), "Is an IP v6");
        $this->assertTrue(StringValidation::isIpV6("f000::0000:0000:0000:0000"), "Is an IP v6");
    }

    public function testIsIpV6False()
    {
        $this->assertFalse(StringValidation::isIpV6("0000:0000:0000:0000:0000"), "Is not an IP v6");
        $this->assertFalse(StringValidation::isIpV6("g000::0000:0000:0000:0000"), "Is not an IP v6");
    }

    public function testIsLengthEqualsTrue()
    {
        $this->assertTrue(StringValidation::isLengthEqualsThan("text string", 11), "Is a string with a length equals to 9");
    }
    public function testIsLengthEqualsFalse()
    {
        $this->assertFalse(StringValidation::isLengthEqualsThan("text string", 10), "Is not a string with a length equals to 10");
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
    public function testIsSerializedTrue()
    {
        $this->assertTrue(StringValidation::isSerialized("b:1;"), "Is a serialized bool true");
        $this->assertTrue(StringValidation::isSerialized("b:0;"), "Is a serialized bool false");
        $this->assertTrue(StringValidation::isSerialized('a:2:{i:0;s:1:"a";i:1;s:1:"b";}'), "Is a serialized indexed array");
        $this->assertTrue(StringValidation::isSerialized('a:2:{s:1:"a";s:1:"a";s:1:"b";s:1:"b";}'), "Is a serialized assoc array");
        $this->assertTrue(StringValidation::isSerialized('s:16:"this is a string";'), "Is a serialized string");
        $this->assertTrue(StringValidation::isSerialized('i:123;'), "Is a serialized integer");
        $this->assertTrue(StringValidation::isSerialized('d:123.456;'), "Is a serialized float");
        $this->assertTrue(StringValidation::isSerialized('O:8:"stdClass":1:{s:1:"a";s:1:"a";}'), "Is a serialized object");
    }
    public function testIsSerializedFalse()
    {
        $this->assertFalse(StringValidation::isSerialized(true), "Is a serialized bool true");
        $this->assertFalse(StringValidation::isSerialized(false), "Is a serialized bool false");
        $this->assertFalse(StringValidation::isSerialized('this is a string'), "Is a serialized string");
        $this->assertFalse(StringValidation::isSerialized(123), "Is a serialized integer");
        $this->assertFalse(StringValidation::isSerialized(123.456), "Is a serialized float");
    }

    public function testIsStartingTrue()
    {
        $this->assertTrue(StringValidation::isValueStartingWith('Cadena original', 'Cadena'), "Starts with true");
        $this->assertTrue(StringValidation::isValueStartingWith('Cadena original', 'Cadena '), "Starts with true");
    }
    public function testIsStartingFalse()
    {
        $this->assertFalse(StringValidation::isValueStartingWith('Cadena original', 'cadena'), "Starts with false");
        $this->assertFalse(StringValidation::isValueStartingWith(' Cadena original', 'cadena'), "Starts with false");
        $this->assertFalse(StringValidation::isValueStartingWith('caden', 'cadena'), "Starts with false");
    }

    public function testIsEndingTrue()
    {
        $this->assertTrue(StringValidation::isValueEndingWith('Cadena original', 'original'), "End with true");
        $this->assertTrue(StringValidation::isValueEndingWith('Cadena original', ' original'), "End with true");
    }
    public function testIsEndingFalse()
    {
        $this->assertFalse(StringValidation::isValueEndingWith('Cadena original', 'original '), "End with false");
        $this->assertFalse(StringValidation::isValueEndingWith(' Cadena original', 'Original'), "End with false");
        $this->assertFalse(StringValidation::isValueEndingWith('origina', 'original'), "End with false");
    }
    public function testIsContainingTrue()
    {
        $this->assertTrue(StringValidation::isValueContaining('Cadena original', 'Cadena'), "contains true");
        $this->assertTrue(StringValidation::isValueContaining('Cadena original', 'original'), "contains true");
        $this->assertTrue(StringValidation::isValueContaining('Cadena original', 'origina'), "contains true");
    }
    public function testIsContainingFalse()
    {
        $this->assertFalse(StringValidation::isValueContaining('Cadena origina', 'original'), "contains false");
        $this->assertFalse(StringValidation::isValueContaining(' Cadena original', 'Original'), "contains false");
        $this->assertFalse(StringValidation::isValueContaining('origina', 'original'), "contains false");
    }
    public function testIsContainingAnyTrue()
    {
        $this->assertTrue(StringValidation::isValueContainingAny('Cadena original', 'Cadena'), "contains true");
        $this->assertTrue(StringValidation::isValueContainingAny('Cadena original', 'original'), "contains true");
        $this->assertTrue(StringValidation::isValueContainingAny('Cadena original', 'origina'), "contains true");
    }
    public function testIsEqualsTrue()
    {
        $this->assertTrue(StringValidation::isValueEquals('Cadena original', 'Cadena original'), "equals true");
    }
    public function testIsEqualsFalse()
    {
        $this->assertFalse(StringValidation::isValueEquals('Cadena origina', 'original'), "equals false");
        $this->assertFalse(StringValidation::isValueEquals(' Cadena original', 'cadena original'), "equals false");
    }
    public function testIsEqualsAnyTrue()
    {
        $this->assertTrue(StringValidation::isValueEqualsAny('Cadena original', ...['Cadena original', 'cadena original', 'cadena Original']), "equals any true");
        $this->assertTrue(StringValidation::isValueEqualsAny('Cadena original', 'Cadena original', 'cadena original', 'cadena Original'), "equals any true");
    }
    public function testIsEqualsAnyFalse()
    {
        $this->assertFalse(StringValidation::isValueEqualsAny('Cadena original', ...['cadena', 'original', 'cadena original']), "equals any false");
        $this->assertFalse(StringValidation::isValueEqualsAny('Cadena original', 'Cadena', 'original', 'Cadena origina'), "equals any false");
        $this->assertFalse(StringValidation::isValueEqualsAny('Cadena original', 'cadena', 'original', 'cadena original'), "equals any false");
        $this->assertFalse(StringValidation::isValueEqualsAny('Cadena original', ...['Cadena', 'original', 'Cadena origina']), "equals any false");
    }
}