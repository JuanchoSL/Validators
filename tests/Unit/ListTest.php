<?php

namespace JuanchoSL\Validators\Tests\Unit;


use JuanchoSL\Exceptions\PreconditionFailedException;
use JuanchoSL\Validators\Types\Iterables\ListValidation;
use JuanchoSL\Validators\Types\Strings\StringValidations;
use PHPUnit\Framework\TestCase;

class ListTest extends TestCase
{
    public function testIsIterableTrue()
    {
        $this->assertTrue(ListValidation::is(["text iterable"]), "Is an iterable");
        $this->assertTrue(ListValidation::is([]), "Is an iterable");
    }
    public function testIsIterableFalse()
    {
        $this->assertFalse(ListValidation::is(123456), "Is not an iterable");
        $this->assertFalse(ListValidation::is(false), "Is not an iterable");
        $this->assertFalse(ListValidation::is(true), "Is not an iterable");
        $this->assertFalse(ListValidation::is(null), "Is not an iterable");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue(ListValidation::isEmpty([]), "Is an empty iterable");
    }
    public function testIsEmptyFalse()
    {
        $this->assertFalse(ListValidation::isEmpty(['iterable']), "Is not an empty iterable");
        $this->assertFalse(ListValidation::isEmpty([null]), "Is not an empty iterable");
        $this->assertFalse(ListValidation::isEmpty([0]), "Is not an empty iterable");
        $this->assertFalse(ListValidation::isEmpty([false]), "Is not an empty iterable");
    }
    public function testIsNotEmptyTrue()
    {
        $this->assertTrue(ListValidation::isNotEmpty(['iterable']), "Is not an empty iterable");
    }
    public function testIsNotEmptyFalse()
    {
        $this->assertFalse(ListValidation::isNotEmpty([]), "Is an empty iterable");
    }
    public function testIsNotEmptyError()
    {
        $this->expectException(PreconditionFailedException::class);
        $this->assertFalse(ListValidation::isNotEmpty(null), "Is not an iterable");
        $this->assertFalse(ListValidation::isNotEmpty(false), "Is not an iterable");
    }

    public function testIsLengthEqualsTrue()
    {
        $this->assertTrue(ListValidation::isLengthEqualsThan(str_split("text string"), 11), "Is a string with a length equals to 9");
    }
    public function testIsLengthEqualsFalse()
    {
        $this->assertFalse(ListValidation::isLengthEqualsThan(str_split("text string"), 10), "Is not a string with a length equals to 10");
    }

    public function testIsLengthGreatherThanTrue()
    {
        $this->assertTrue(ListValidation::isLengthGreatherThan(str_split("text string"), 10), "Is a string with a length greather than 10");
    }

    public function testIsLengthGreatherThanFalse()
    {
        $this->assertFalse(ListValidation::isLengthGreatherThan(str_split("text string"), 15), "Is not a string with a length greather than 10");
        $this->assertFalse(ListValidation::isLengthGreatherThan(str_split("text string"), 11), "Is not a string with a length greather than 11");
    }

    public function testIsLengthGreatherOrEqualsThanTrue()
    {
        $this->assertTrue(ListValidation::isLengthGreatherOrEqualsThan(str_split("text string"), 10), "Is a string with a length greather than 10");
        $this->assertTrue(ListValidation::isLengthGreatherOrEqualsThan(str_split("text string"), 11), "Is a string with a length equals than 11");
    }

    public function testIsLengthGreatherOrEqualsThanFalse()
    {
        $this->assertFalse(ListValidation::isLengthGreatherOrEqualsThan(str_split("text string"), 15), "Is not a string with length greather or equals than 15");
    }

    public function testIsLengthLessOrEqualsThanTrue()
    {
        $this->assertTrue(ListValidation::isLengthLessOrEqualsThan(str_split("text string"), 15), "Is a string with a length less than 15");
        $this->assertTrue(ListValidation::isLengthLessOrEqualsThan(str_split("text string"), 11), "Is a string with a length less than 11");
    }

    public function testIsLengthLessOrEqualsThanFalse()
    {
        $this->assertFalse(ListValidation::isLengthLessOrEqualsThan(str_split("text string"), 10), "Is not a string with length less than 10");
    }

    public function testIsLengthLessThanTrue()
    {
        $this->assertTrue(ListValidation::isLengthLessThan(str_split("text string"), 15), "Is a string with a length less than 15");
        $this->assertTrue(ListValidation::isLengthLessThan(str_split("text string"), 12), "Is a string with a length less than 12");
    }

    public function testIsLengthLessThanFalse()
    {
        $this->assertFalse(ListValidation::isLengthLessThan(str_split("text string"), 10), "Is not a string with length less than 10");
    }
    public function testIsContainingTrue()
    {
        $this->assertTrue(ListValidation::isValueContaining(['Cadena numeros', 'Cadena letras'], 'Cadena'), "contains true");
        $this->assertTrue(ListValidation::isValueContaining(['serie letras', 'cadena letras'], 'letras'), "contains true");
        $this->assertTrue(ListValidation::isValueContaining(['cola', 'pila'], 'la'), "contains true");
    }
    public function testIsContainingFalse()
    {
        $this->assertFalse(ListValidation::isValueContaining(['Cadena', 'origina'], 'original'), "contains false");
        $this->assertFalse(ListValidation::isValueContaining([' Cadena', 'original'], 'Original'), "contains false");
        $this->assertFalse(ListValidation::isValueContaining(['origina'], 'original'), "contains false");
    }
    public function testIsContainingAnyTrue()
    {
        $this->assertTrue(ListValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], 'numeros', 'letras'), "contains true");
        $this->assertTrue(ListValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], 'Cadena', 'palabras'), "contains true");
        $this->assertTrue(ListValidation::isValueContainingAny(['serie letras', 'cadena letras'], 'serie', 'cadena'), "contains true");
        $this->assertTrue(ListValidation::isValueContainingAny(['cola', 'pila'], 'cola', 'pila'), "contains true");

        $this->assertTrue(ListValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], ...['numeros', 'letras']), "contains true");
        $this->assertTrue(ListValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], ...['Cadena', 'palabras']), "contains true");
        $this->assertTrue(ListValidation::isValueContainingAny(['serie letras', 'cadena letras'], ...['serie', 'cadena']), "contains true");
        $this->assertTrue(ListValidation::isValueContainingAny(['cola', 'pila'], ...['cola', 'pila']), "contains true");
    }
    public function testIsContainingAnyFalse()
    {
        $this->assertFalse(ListValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], 'numeros', 'palabras'), "contains true");
        $this->assertFalse(ListValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], ...['numeros', 'palabras']), "contains true");
    }
    public function testIsValueValidatingTrue()
    {
        $this->assertTrue(ListValidation::isValueValidating(["aaaa@bbb.com", "bbb@ccc.es"], (new StringValidations())->isEmail()), "All values are emails");
    }

    public function testIsValueValidatingFalse()
    {
        $this->assertFalse(ListValidation::isValueValidating(["aaaa@bbb.com", "bbb@ccc.es", ""], (new StringValidations())->isEmail()), "All values are not emails");
    }

    public function testIsValueValidatingAnyTrue()
    {
        $this->assertTrue(ListValidation::isValueValidatingAny(["aaaa@bbb.com", "bbb@ccc.es", ''], (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "All values are emails or empty");
    }

    public function testIsValueValidatingAnyFalse()
    {
        $this->assertFalse(ListValidation::isValueValidatingAny(["aaaa@bbb.com", "bbb@ccc.es", "a"], (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "All values are emails or empty failing");
    }

    /*
    public function testIsEntiyValidatingTrue()
    {
        $this->assertTrue(ListValidation::isValueAttributeValidating([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => "https://www.url.com/index.php"]
        ], 'url', (new StringValidations())->isUrl()), "All values at index url are urls");
    }

    public function testIsEntiyValidatingFalse()
    {
        $this->assertFalse(ListValidation::isValueAttributeValidating([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => ""]
        ], 'url', (new StringValidations())->isUrl()), "Don't all values are urls");
    }
    public function testIsEntiyValidatingAnyTrue()
    {
        $this->assertTrue(ListValidation::isValueAttributeValidating([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => "https://www.url.com/index.php"]
        ], 'url', (new StringValidations())->isUrl()), "All values at index url are urls");
    }

    public function testIsEntiyValidatingAnyFalse()
    {
        $this->assertFalse(ListValidation::isValueAttributeValidatingAny([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => ""]
        ], 'url', (new StringValidations())->isUrl()), "Don't all values are urls");
    }
    */
}