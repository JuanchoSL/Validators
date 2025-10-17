<?php

namespace JuanchoSL\Validators\Tests\Unit;


use JuanchoSL\Validators\Types\Iterables\IterableValidation;
use PHPUnit\Framework\TestCase;

class IterableTest extends TestCase
{
    public function testIsIterableTrue()
    {
        $this->assertTrue(IterableValidation::is(["text iterable"]), "Is an iterable");
        $this->assertTrue(IterableValidation::is([]), "Is an iterable");
    }
    public function testIsIterableFalse()
    {
        $this->assertFalse(IterableValidation::is(123456), "Is not an iterable");
        $this->assertFalse(IterableValidation::is(false), "Is not an iterable");
        $this->assertFalse(IterableValidation::is(true), "Is not an iterable");
        $this->assertFalse(IterableValidation::is(null), "Is not an iterable");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue(IterableValidation::isEmpty([]), "Is an empty iterable");
    }
    public function testIsEmptyFalse()
    {
        $this->assertFalse(IterableValidation::isEmpty(['iterable']), "Is not an empty iterable");
        $this->assertFalse(IterableValidation::isEmpty([null]), "Is not an empty iterable");
        $this->assertFalse(IterableValidation::isEmpty([0]), "Is not an empty iterable");
        $this->assertFalse(IterableValidation::isEmpty([false]), "Is not an empty iterable");
    }
    public function testIsNotEmptyTrue()
    {
        $this->assertTrue(IterableValidation::isNotEmpty(['iterable']), "Is not an empty iterable");
    }
    public function testIsNotEmptyFalse()
    {
        $this->assertFalse(IterableValidation::isNotEmpty([]), "Is an empty iterable");
        $this->assertFalse(IterableValidation::isNotEmpty(null), "Is an empty iterable");
        $this->assertFalse(IterableValidation::isNotEmpty(false), "Is an empty iterable");
    }

    public function testIsLengthEqualsTrue()
    {
        $this->assertTrue(IterableValidation::isLengthEqualsThan(str_split("text string"), 11), "Is a string with a length equals to 9");
    }
    public function testIsLengthEqualsFalse()
    {
        $this->assertFalse(IterableValidation::isLengthEqualsThan(str_split("text string"), 10), "Is not a string with a length equals to 10");
    }

    public function testIsLengthGreatherThanTrue()
    {
        $this->assertTrue(IterableValidation::isLengthGreatherThan(str_split("text string"), 10), "Is a string with a length greather than 10");
    }

    public function testIsLengthGreatherThanFalse()
    {
        $this->assertFalse(IterableValidation::isLengthGreatherThan(str_split("text string"), 15), "Is not a string with a length greather than 10");
        $this->assertFalse(IterableValidation::isLengthGreatherThan(str_split("text string"), 11), "Is not a string with a length greather than 11");
    }

    public function testIsLengthGreatherOrEqualsThanTrue()
    {
        $this->assertTrue(IterableValidation::isLengthGreatherOrEqualsThan(str_split("text string"), 10), "Is a string with a length greather than 10");
        $this->assertTrue(IterableValidation::isLengthGreatherOrEqualsThan(str_split("text string"), 11), "Is a string with a length equals than 11");
    }

    public function testIsLengthGreatherOrEqualsThanFalse()
    {
        $this->assertFalse(IterableValidation::isLengthGreatherOrEqualsThan(str_split("text string"), 15), "Is not a string with length greather or equals than 15");
    }

    public function testIsLengthLessOrEqualsThanTrue()
    {
        $this->assertTrue(IterableValidation::isLengthLessOrEqualsThan(str_split("text string"), 15), "Is a string with a length less than 15");
        $this->assertTrue(IterableValidation::isLengthLessOrEqualsThan(str_split("text string"), 11), "Is a string with a length less than 11");
    }

    public function testIsLengthLessOrEqualsThanFalse()
    {
        $this->assertFalse(IterableValidation::isLengthLessOrEqualsThan(str_split("text string"), 10), "Is not a string with length less than 10");
    }

    public function testIsLengthLessThanTrue()
    {
        $this->assertTrue(IterableValidation::isLengthLessThan(str_split("text string"), 15), "Is a string with a length less than 15");
        $this->assertTrue(IterableValidation::isLengthLessThan(str_split("text string"), 12), "Is a string with a length less than 12");
    }

    public function testIsLengthLessThanFalse()
    {
        $this->assertFalse(IterableValidation::isLengthLessThan(str_split("text string"), 10), "Is not a string with length less than 10");
    }
    public function testIsContainingTrue()
    {
        $this->assertTrue(IterableValidation::isValueContaining(['Cadena numeros', 'Cadena letras'], 'Cadena'), "contains true");
        $this->assertTrue(IterableValidation::isValueContaining(['serie letras', 'cadena letras'], 'letras'), "contains true");
        $this->assertTrue(IterableValidation::isValueContaining(['cola', 'pila'], 'la'), "contains true");
    }
    public function testIsContainingFalse()
    {
        $this->assertFalse(IterableValidation::isValueContaining(['Cadena', 'origina'], 'original'), "contains false");
        $this->assertFalse(IterableValidation::isValueContaining([' Cadena', 'original'], 'Original'), "contains false");
        $this->assertFalse(IterableValidation::isValueContaining(['origina'], 'original'), "contains false");
    }
    public function testIsContainingAnyTrue()
    {
        $this->assertTrue(IterableValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], 'numeros', 'letras'), "contains true");
        $this->assertTrue(IterableValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], 'Cadena', 'palabras'), "contains true");
        $this->assertTrue(IterableValidation::isValueContainingAny(['serie letras', 'cadena letras'], 'serie', 'cadena'), "contains true");
        $this->assertTrue(IterableValidation::isValueContainingAny(['cola', 'pila'], 'cola', 'pila'), "contains true");

        $this->assertTrue(IterableValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], ...['numeros', 'letras']), "contains true");
        $this->assertTrue(IterableValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], ...['Cadena', 'palabras']), "contains true");
        $this->assertTrue(IterableValidation::isValueContainingAny(['serie letras', 'cadena letras'], ...['serie', 'cadena']), "contains true");
        $this->assertTrue(IterableValidation::isValueContainingAny(['cola', 'pila'], ...['cola', 'pila']), "contains true");
    }
    public function testIsContainingAnyFalse()
    {
        $this->assertFalse(IterableValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], 'numeros', 'palabras'), "contains true");
        $this->assertFalse(IterableValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], ...['numeros', 'palabras']), "contains true");
    }

    public function testIsKeyContainingAnyTrue()
    {
        $this->assertTrue(IterableValidation::isKeyContainingAny(['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras'], 'nombre', 'apellidos'), "contains false");
        $this->assertTrue(IterableValidation::isKeyContainingAny(['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras'], ...['nombre', 'apellidos']), "contains false");
    }
    public function testIsKeyContainingAnyFalse()
    {
        $this->assertFalse(IterableValidation::isKeyContainingAny(['nombre' => 'Cadena numeros', 'apellido' => 'Cadena letras'], 'numeros', 'palabras'), "contains false");
        $this->assertFalse(IterableValidation::isKeyContainingAny(['nombre' => 'Cadena numeros', 'apellido' => 'Cadena letras'], ...['numeros', 'palabras']), "contains false");
    }



    /*
    public function testIsEmailTrue()
    {
        $this->assertTrue(IterableValidation::isEmail("juanchosl@hotmail.com"), "Is an email");
    }

    public function testIsEmailFalse()
    {
        $this->assertFalse(IterableValidation::isEmail("juanchosl@hotmail"), "Is not an email");
    }

    public function testIsUrlTrue()
    {
        $this->assertTrue(IterableValidation::isUrl("http://url.com"), "Is an url");
        $this->assertTrue(IterableValidation::isUrl("https://url.com"), "Is an url");
        $this->assertTrue(IterableValidation::isUrl("https://www.url.com"), "Is an url");
        $this->assertTrue(IterableValidation::isUrl("ftp://ftp.url.com"), "Is an url");
        $this->assertTrue(IterableValidation::isUrl("ftps://ftp.url.com"), "Is an url");
        $this->assertTrue(IterableValidation::isUrl("https://www.url.com/index.php"), "Is an url");
    }

    public function testIsUrlFalse()
    {
        $this->assertFalse(IterableValidation::isUrl("isnotanurl"), "Is not an url");
        $this->assertFalse(IterableValidation::isUrl("www.url.com"), "Is not an url");
    }

    public function testIsDomainTrue()
    {
        $this->assertTrue(IterableValidation::isDomain("com"), "Is a domain");
        $this->assertTrue(IterableValidation::isDomain("url.com"), "Is a domain");
        $this->assertTrue(IterableValidation::isDomain("www.url.com"), "Is a domain");
        $this->assertTrue(IterableValidation::isDomain("ftp.url.com"), "Is a domain");
        $this->assertTrue(IterableValidation::isDomain("ftp.url.com"), "Is a domain");
    }

    public function testIsDomainFalse()
    {
        $this->assertFalse(IterableValidation::isDomain("http://isnotanurl"), "Is not a domain");
        $this->assertFalse(IterableValidation::isDomain("ftp://ftp.url.com"), "Is not a domain");
        $this->assertFalse(IterableValidation::isDomain("ftps://ftp.url.com"), "Is not a domain");
        $this->assertFalse(IterableValidation::isDomain("www.url.com/index.html"), "Is not a domain");
    }

    public function testIsMacTrue()
    {
        $this->assertTrue(IterableValidation::isMac("00:00:00:00:00:00"), "Is a MAC");
        $this->assertTrue(IterableValidation::isMac("00-00-00-00-00-00"), "Is a MAC");
        $this->assertTrue(IterableValidation::isMac("f0:00:00:00:00:00"), "Is a MAC");
        $this->assertTrue(IterableValidation::isMac("F0-00-00-00-00-00"), "Is a MAC");
    }

    public function testIsMacFalse()
    {
        $this->assertFalse(IterableValidation::isMac("aaa:aaa:aaa:aaa"), "Is not a MAC");
        $this->assertFalse(IterableValidation::isMac("G0:00:00:00:00:00"), "Is not a MAC");
        $this->assertFalse(IterableValidation::isMac("G0-00-00-00-00-00"), "Is not a MAC");
    }

    public function testIsIpV4True()
    {
        $this->assertTrue(IterableValidation::isIpV4("192.168.0.1"), "Is an IP v4 ");
    }

    public function testIsIpV4False()
    {
        $this->assertFalse(IterableValidation::isIpV4(123456), "Is not an IP v4");
        $this->assertFalse(IterableValidation::isIpV4("123456"), "Is not an IP v4");
        $this->assertFalse(IterableValidation::isIpV4("192.168.0.256"), "Is not an IP v4");
    }

    public function testIsIpV6True()
    {
        $this->assertTrue(IterableValidation::isIpV6("0000::0000:0000:0000:0000"), "Is an IP v6");
        $this->assertTrue(IterableValidation::isIpV6("f000::0000:0000:0000:0000"), "Is an IP v6");
    }

    public function testIsIpV6False()
    {
        $this->assertFalse(IterableValidation::isIpV6("0000:0000:0000:0000:0000"), "Is not an IP v6");
        $this->assertFalse(IterableValidation::isIpV6("g000::0000:0000:0000:0000"), "Is not an IP v6");
    }

    public function testIsSerializedTrue()
    {
        $this->assertTrue(IterableValidation::isSerialized("b:1;"), "Is a serialized bool true");
        $this->assertTrue(IterableValidation::isSerialized("b:0;"), "Is a serialized bool false");
        $this->assertTrue(IterableValidation::isSerialized('a:2:{i:0;s:1:"a";i:1;s:1:"b";}'), "Is a serialized indexed array");
        $this->assertTrue(IterableValidation::isSerialized('a:2:{s:1:"a";s:1:"a";s:1:"b";s:1:"b";}'), "Is a serialized assoc array");
        $this->assertTrue(IterableValidation::isSerialized('s:16:"this is a string";'), "Is a serialized string");
        $this->assertTrue(IterableValidation::isSerialized('i:123;'), "Is a serialized integer");
        $this->assertTrue(IterableValidation::isSerialized('d:123.456;'), "Is a serialized float");
        $this->assertTrue(IterableValidation::isSerialized('O:8:"stdClass":1:{s:1:"a";s:1:"a";}'), "Is a serialized object");
    }
    public function testIsSerializedFalse()
    {
        $this->assertFalse(IterableValidation::isSerialized(true), "Is a serialized bool true");
        $this->assertFalse(IterableValidation::isSerialized(false), "Is a serialized bool false");
        $this->assertFalse(IterableValidation::isSerialized('this is a string'), "Is a serialized string");
        $this->assertFalse(IterableValidation::isSerialized(123), "Is a serialized integer");
        $this->assertFalse(IterableValidation::isSerialized(123.456), "Is a serialized float");
    }

    public function testIsStartingTrue()
    {
        $this->assertTrue(IterableValidation::isValueStartingWith('Cadena original', 'Cadena'), "Starts with true");
        $this->assertTrue(IterableValidation::isValueStartingWith('Cadena original', 'Cadena '), "Starts with true");
    }
    public function testIsStartingFalse()
    {
        $this->assertFalse(IterableValidation::isValueStartingWith('Cadena original', 'cadena'), "Starts with false");
        $this->assertFalse(IterableValidation::isValueStartingWith(' Cadena original', 'cadena'), "Starts with false");
        $this->assertFalse(IterableValidation::isValueStartingWith('caden', 'cadena'), "Starts with false");
    }

    public function testIsEndingTrue()
    {
        $this->assertTrue(IterableValidation::isValueEndingWith('Cadena original', 'original'), "End with true");
        $this->assertTrue(IterableValidation::isValueEndingWith('Cadena original', ' original'), "End with true");
    }
    public function testIsEndingFalse()
    {
        $this->assertFalse(IterableValidation::isValueEndingWith('Cadena original', 'original '), "End with false");
        $this->assertFalse(IterableValidation::isValueEndingWith(' Cadena original', 'Original'), "End with false");
        $this->assertFalse(IterableValidation::isValueEndingWith('origina', 'original'), "End with false");
    }

    */
}