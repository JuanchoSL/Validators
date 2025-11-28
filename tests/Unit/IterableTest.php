<?php

namespace JuanchoSL\Validators\Tests\Unit;


use JuanchoSL\Validators\Types\Iterables\IterableValidation;
use JuanchoSL\Validators\Types\Strings\StringValidations;
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

    public function testIsValueValidatingTrue()
    {
        $this->assertTrue(IterableValidation::isValueValidating(["aaaa@bbb.com", "bbb@ccc.es"], (new StringValidations())->isEmail()), "All values are emails");
    }

    public function testIsValueValidatingFalse()
    {
        $this->assertFalse(IterableValidation::isValueValidating(["aaaa@bbb.com", "bbb@ccc.es", ""], (new StringValidations())->isEmail()), "All values are not emails");
    }

    public function testIsValueValidatingAnyTrue()
    {
        $this->assertTrue(IterableValidation::isValueValidatingAny(["aaaa@bbb.com", "bbb@ccc.es", ''], (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "All values are emails or empty");
    }

    public function testIsValueValidatingAnyFalse()
    {
        $this->assertFalse(IterableValidation::isValueValidatingAny(["aaaa@bbb.com", "bbb@ccc.es", "a"], (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "All values are emails or empty failing");
    }

    public function testIsEntiyValidatingTrue()
    {
        $this->assertTrue(IterableValidation::isValueAttributeValidating([
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
        $this->assertFalse(IterableValidation::isValueAttributeValidating([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => ""],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"]
        ], 'url', (new StringValidations())->isUrl()), "Don't all values are urls");
    }
/*
    public function testIsEntiyValidatingAnyTrue()
    {
        $this->assertTrue(IterableValidation::isValueAttributeValidating([
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
        $this->assertFalse(IterableValidation::isValueAttributeValidatingAny([
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