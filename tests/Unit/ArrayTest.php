<?php

namespace JuanchoSL\Validators\Tests\Unit;


use JuanchoSL\Exceptions\PreconditionFailedException;
use JuanchoSL\Validators\Types\Iterables\ArrayValidation;
use JuanchoSL\Validators\Types\Strings\StringValidations;
use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    public function testIsIterableTrue()
    {
        $this->assertTrue(ArrayValidation::is(["text iterable"]), "Is an iterable");
        $this->assertTrue(ArrayValidation::is([]), "Is an iterable");
    }
    public function testIsIterableFalse()
    {
        $this->assertFalse(ArrayValidation::is(123456), "Is not an iterable");
        $this->assertFalse(ArrayValidation::is(false), "Is not an iterable");
        $this->assertFalse(ArrayValidation::is(true), "Is not an iterable");
        $this->assertFalse(ArrayValidation::is(null), "Is not an iterable");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue(ArrayValidation::isEmpty([]), "Is an empty iterable");
    }
    public function testIsEmptyError()
    {
        $this->expectException(PreconditionFailedException::class);
        $this->assertFalse(ArrayValidation::isEmpty(false), "Is not an iterable");
        $this->assertFalse(ArrayValidation::isLengthEqualsThan('', 5), "Is not an iterable");
    }
    public function testIsEmptyFalse()
    {
        $this->assertFalse(ArrayValidation::isEmpty(['iterable']), "Is not an empty iterable");
        $this->assertFalse(ArrayValidation::isEmpty([null]), "Is not an empty iterable");
        $this->assertFalse(ArrayValidation::isEmpty([0]), "Is not an empty iterable");
        $this->assertFalse(ArrayValidation::isEmpty([false]), "Is not an empty iterable");
    }
    public function testIsNotEmptyTrue()
    {
        $this->assertTrue(ArrayValidation::isNotEmpty(['iterable']), "Is not an empty iterable");
    }
    public function testIsNotEmptyFalse()
    {
        $this->assertFalse(ArrayValidation::isNotEmpty([]), "Is an empty iterable");
    }
    public function testIsNotEmptyError()
    {
        $this->expectException(PreconditionFailedException::class);
        $this->assertFalse(ArrayValidation::isNotEmpty(null), "Is not an iterable");
        $this->assertFalse(ArrayValidation::isNotEmpty(false), "Is not an iterable");
    }

    public function testIsLengthEqualsTrue()
    {
        $this->assertTrue(ArrayValidation::isLengthEqualsThan(str_split("text string"), 11), "Is a string with a length equals to 9");
    }
    public function testIsLengthEqualsFalse()
    {
        $this->assertFalse(ArrayValidation::isLengthEqualsThan(str_split("text string"), 10), "Is not a string with a length equals to 10");
    }

    public function testIsLengthGreatherThanTrue()
    {
        $this->assertTrue(ArrayValidation::isLengthGreatherThan(str_split("text string"), 10), "Is a string with a length greather than 10");
    }

    public function testIsLengthGreatherThanFalse()
    {
        $this->assertFalse(ArrayValidation::isLengthGreatherThan(str_split("text string"), 15), "Is not a string with a length greather than 10");
        $this->assertFalse(ArrayValidation::isLengthGreatherThan(str_split("text string"), 11), "Is not a string with a length greather than 11");
    }

    public function testIsLengthGreatherOrEqualsThanTrue()
    {
        $this->assertTrue(ArrayValidation::isLengthGreatherOrEqualsThan(str_split("text string"), 10), "Is a string with a length greather than 10");
        $this->assertTrue(ArrayValidation::isLengthGreatherOrEqualsThan(str_split("text string"), 11), "Is a string with a length equals than 11");
    }

    public function testIsLengthGreatherOrEqualsThanFalse()
    {
        $this->assertFalse(ArrayValidation::isLengthGreatherOrEqualsThan(str_split("text string"), 15), "Is not a string with length greather or equals than 15");
    }

    public function testIsLengthLessOrEqualsThanTrue()
    {
        $this->assertTrue(ArrayValidation::isLengthLessOrEqualsThan(str_split("text string"), 15), "Is a string with a length less than 15");
        $this->assertTrue(ArrayValidation::isLengthLessOrEqualsThan(str_split("text string"), 11), "Is a string with a length less than 11");
    }

    public function testIsLengthLessOrEqualsThanFalse()
    {
        $this->assertFalse(ArrayValidation::isLengthLessOrEqualsThan(str_split("text string"), 10), "Is not a string with length less than 10");
    }

    public function testIsLengthLessThanTrue()
    {
        $this->assertTrue(ArrayValidation::isLengthLessThan(str_split("text string"), 15), "Is a string with a length less than 15");
        $this->assertTrue(ArrayValidation::isLengthLessThan(str_split("text string"), 12), "Is a string with a length less than 12");
    }

    public function testIsLengthLessThanFalse()
    {
        $this->assertFalse(ArrayValidation::isLengthLessThan(str_split("text string"), 10), "Is not a string with length less than 10");
    }
    public function testIsContainingTrue()
    {
        $this->assertTrue(ArrayValidation::isValueContaining(['Cadena numeros', 'Cadena letras'], 'Cadena'), "contains true");
        $this->assertTrue(ArrayValidation::isValueContaining(['serie letras', 'cadena letras'], 'letras'), "contains true");
        $this->assertTrue(ArrayValidation::isValueContaining(['cola', 'pila'], 'la'), "contains true");
    }
    public function testIsContainingFalse()
    {
        $this->assertFalse(ArrayValidation::isValueContaining(['Cadena', 'origina'], 'original'), "contains false");
        $this->assertFalse(ArrayValidation::isValueContaining([' Cadena', 'original'], 'Original'), "contains false");
        $this->assertFalse(ArrayValidation::isValueContaining(['origina'], 'original'), "contains false");
    }
    public function testIsContainingAnyTrue()
    {
        $this->assertTrue(ArrayValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], 'numeros', 'letras'), "contains true");
        $this->assertTrue(ArrayValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], 'Cadena', 'palabras'), "contains true");
        $this->assertTrue(ArrayValidation::isValueContainingAny(['serie letras', 'cadena letras'], 'serie', 'cadena'), "contains true");
        $this->assertTrue(ArrayValidation::isValueContainingAny(['cola', 'pila'], 'cola', 'pila'), "contains true");

        $this->assertTrue(ArrayValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], ...['numeros', 'letras']), "contains true");
        $this->assertTrue(ArrayValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], ...['Cadena', 'palabras']), "contains true");
        $this->assertTrue(ArrayValidation::isValueContainingAny(['serie letras', 'cadena letras'], ...['serie', 'cadena']), "contains true");
        $this->assertTrue(ArrayValidation::isValueContainingAny(['cola', 'pila'], ...['cola', 'pila']), "contains true");
    }
    public function testIsContainingAnyFalse()
    {
        $this->assertFalse(ArrayValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], 'numeros', 'palabras'), "contains true");
        $this->assertFalse(ArrayValidation::isValueContainingAny(['Cadena numeros', 'Cadena letras'], ...['numeros', 'palabras']), "contains true");
    }

    public function testIsKeyContainingAnyTrue()
    {
        $this->assertTrue(ArrayValidation::isKeyContainingAny(['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras'], 'nombre', 'apellidos'), "contains false");
        $this->assertTrue(ArrayValidation::isKeyContainingAny(['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras'], ...['nombre', 'apellidos']), "contains false");
    }
    public function testIsKeyContainingAnyFalse()
    {
        $this->assertFalse(ArrayValidation::isKeyContainingAny(['nombre' => 'Cadena numeros', 'apellido' => 'Cadena letras'], 'numeros', 'palabras'), "contains false");
        $this->assertFalse(ArrayValidation::isKeyContainingAny(['nombre' => 'Cadena numeros', 'apellido' => 'Cadena letras'], ...['numeros', 'palabras']), "contains false");
    }

    public function testIsValueValidatingTrue()
    {
        $this->assertTrue(ArrayValidation::isValueValidating(["aaaa@bbb.com", "bbb@ccc.es"], (new StringValidations())->isEmail()), "All values are emails");
    }

    public function testIsValueValidatingFalse()
    {
        $this->assertFalse(ArrayValidation::isValueValidating(["aaaa@bbb.com", "bbb@ccc.es", ""], (new StringValidations())->isEmail()), "All values are not emails");
    }

    public function testIsValueValidatingAnyTrue()
    {
        $this->assertTrue(ArrayValidation::isValueValidatingAny(["aaaa@bbb.com", "bbb@ccc.es", ''], (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "All values are emails or empty");
    }

    public function testIsValueValidatingAnyFalse()
    {
        $this->assertFalse(ArrayValidation::isValueValidatingAny(["aaaa@bbb.com", "bbb@ccc.es", "a"], (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "All values are emails or empty failing");
    }

    public function testIsEntiyValidatingTrue()
    {
        $this->assertTrue(ArrayValidation::isValueAttributeValidating([
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
        $this->assertFalse(ArrayValidation::isValueAttributeValidating([
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
        $this->assertTrue(ArrayValidation::isValueAttributeValidating([
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
        $this->assertFalse(ArrayValidation::isValueAttributeValidatingAny([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => ""]
        ], 'url', (new StringValidations())->isUrl()), "Don't all values are urls");
    }
}