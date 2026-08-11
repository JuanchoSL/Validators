<?php

namespace JuanchoSL\Validators\Tests\Unit;


use JuanchoSL\Exceptions\PreconditionFailedException;
use JuanchoSL\Validators\Types\Iterables\CollectionValidation;
use JuanchoSL\Validators\Types\Strings\StringValidations;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    public function testIsCollectionTrue()
    {
        $this->assertTrue(CollectionValidation::is([["text" => "text collection"]]), "Is a collection");
        $this->assertTrue(CollectionValidation::is([]), "Is a collection");
    }
    public function testIsCollectionFalse()
    {
        $this->assertFalse(CollectionValidation::is([["text collection"]]), "Is not a collection");
        $this->assertFalse(CollectionValidation::is(["text collection"]), "Is not a collection");
        $this->assertFalse(CollectionValidation::is(123456), "Is not a collection");
        $this->assertFalse(CollectionValidation::is(false), "Is not a collection");
        $this->assertFalse(CollectionValidation::is(true), "Is not a collection");
        $this->assertFalse(CollectionValidation::is(null), "Is not a collection");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue(CollectionValidation::isEmpty([]), "Is an empty collection");
    }
    public function testIsEmptyError()
    {
        $this->expectException(PreconditionFailedException::class);
        $this->assertFalse(CollectionValidation::isEmpty(false), "Is not not a collection");
        $this->assertFalse(CollectionValidation::isLengthEqualsThan('', 5), "Is not not a collection");
        $this->assertFalse(CollectionValidation::isEmpty(['collection']), "Is not an empty collection");
        $this->assertFalse(CollectionValidation::isEmpty([null]), "Is not an empty collection");
    }

    public function testIsEmptyFalse()
    {
        $this->assertFalse(CollectionValidation::isEmpty([["data" => 'collection']]), "Is not an empty collection");
    }
    public function testIsNotEmptyTrue()
    {
        $this->assertTrue(CollectionValidation::isNotEmpty([["data" => 'collection']]), "Is not an empty collection");
    }

    public function testIsNotEmptyBadType()
    {
        $this->expectException(PreconditionFailedException::class);
        $this->assertFalse(CollectionValidation::isNotEmpty([]), "Is an empty collection");
        $this->assertTrue(CollectionValidation::isNotEmpty([['collection']]), "Is not an empty collection");
        $this->assertFalse(CollectionValidation::isEmpty([[0]]), "Is not an empty collection");
        $this->assertFalse(CollectionValidation::isEmpty([[false]]), "Is not an empty collection");
    }
    public function testIsNotEmptyError()
    {
        $this->expectException(PreconditionFailedException::class);
        $this->assertFalse(CollectionValidation::isNotEmpty(null), "Is not not a collection");
        $this->assertFalse(CollectionValidation::isNotEmpty(false), "Is not not a collection");
    }

    public function testIsLengthEqualsTrue()
    {
        $this->assertTrue(CollectionValidation::isLengthEqualsThan(array_fill(0, 11, ["val"=>'']), 11), "Is a collection with a length equals to 9");
    }
    public function testIsLengthEqualsFalse()
    {
        $this->assertFalse(CollectionValidation::isLengthEqualsThan(array_fill(0, 11, ["val"=>'']), 10), "Is not a string with a length equals to 10");
    }

    public function testIsLengthGreatherThanTrue()
    {
        $this->assertTrue(CollectionValidation::isLengthGreatherThan(array_fill(0, 11, ["val"=>'']), 10), "Is a string with a length greather than 10");
    }

    public function testIsLengthGreatherThanFalse()
    {
        $this->assertFalse(CollectionValidation::isLengthGreatherThan(array_fill(0, 11, ["val"=>'']), 15), "Is not a string with a length greather than 10");
        $this->assertFalse(CollectionValidation::isLengthGreatherThan(array_fill(0, 11, ["val"=>'']), 11), "Is not a string with a length greather than 11");
    }

    public function testIsLengthGreatherOrEqualsThanTrue()
    {
        $this->assertTrue(CollectionValidation::isLengthGreatherOrEqualsThan(array_fill(0, 11, ["val"=>'']), 10), "Is a string with a length greather than 10");
        $this->assertTrue(CollectionValidation::isLengthGreatherOrEqualsThan(array_fill(0, 11, ["val"=>'']), 11), "Is a string with a length equals than 11");
    }

    public function testIsLengthGreatherOrEqualsThanFalse()
    {
        $this->assertFalse(CollectionValidation::isLengthGreatherOrEqualsThan(array_fill(0, 11, ["val"=>'']), 15), "Is not a string with length greather or equals than 15");
    }

    public function testIsLengthLessOrEqualsThanTrue()
    {
        $this->assertTrue(CollectionValidation::isLengthLessOrEqualsThan(array_fill(0, 11, ["val"=>'']), 15), "Is a string with a length less than 15");
        $this->assertTrue(CollectionValidation::isLengthLessOrEqualsThan(array_fill(0, 11, ["val"=>'']), 11), "Is a string with a length less than 11");
    }

    public function testIsLengthLessOrEqualsThanFalse()
    {
        $this->assertFalse(CollectionValidation::isLengthLessOrEqualsThan(array_fill(0, 11, ["val"=>'']), 10), "Is not a string with length less than 10");
    }

    public function testIsLengthLessThanTrue()
    {
        $this->assertTrue(CollectionValidation::isLengthLessThan(array_fill(0, 11, ["val"=>'']), 15), "Is a string with a length less than 15");
        $this->assertTrue(CollectionValidation::isLengthLessThan(array_fill(0, 11, ["val"=>'']), 12), "Is a string with a length less than 12");
    }

    public function testIsLengthLessThanFalse()
    {
        $this->assertFalse(CollectionValidation::isLengthLessThan(array_fill(0, 11, ["val"=>'']), 10), "Is not a string with length less than 10");
    }
    /*
    public function testIsContainingTrue()
    {
        $this->assertTrue(CollectionValidation::isValueContaining([['Cadena numeros'], ['Cadena letras']], 'Cadena'), "contains true");
        $this->assertTrue(CollectionValidation::isValueContaining([['serie letras'], ['cadena letras']], 'letras'), "contains true");
        $this->assertTrue(CollectionValidation::isValueContaining([['cola'], ['pila']], 'la'), "contains true");
    }
    public function testIsContainingFalse()
    {
        $this->assertFalse(CollectionValidation::isValueContaining(['Cadena', 'origina'], 'original'), "contains false");
        $this->assertFalse(CollectionValidation::isValueContaining([' Cadena', 'original'], 'Original'), "contains false");
        $this->assertFalse(CollectionValidation::isValueContaining(['origina'], 'original'), "contains false");
    }
    public function testIsContainingAnyTrue()
    {
        $this->assertTrue(CollectionValidation::isValueContainingAny([['Cadena numeros'], ['Cadena letras']], 'numeros', 'letras'), "contains true");
        $this->assertTrue(CollectionValidation::isValueContainingAny([['Cadena numeros'], ['Cadena letras']], 'Cadena', 'palabras'), "contains true");
        $this->assertTrue(CollectionValidation::isValueContainingAny([['serie letras'], ['cadena letras']], 'serie', 'cadena'), "contains true");
        $this->assertTrue(CollectionValidation::isValueContainingAny([['cola'], ['pila']], 'cola', 'pila'), "contains true");

        $this->assertTrue(CollectionValidation::isValueContainingAny([['Cadena numeros'], ['Cadena letras']], ...['numeros', 'letras']), "contains true");
        $this->assertTrue(CollectionValidation::isValueContainingAny([['Cadena numeros'], ['Cadena letras']], ...['Cadena', 'palabras']), "contains true");
        $this->assertTrue(CollectionValidation::isValueContainingAny([['serie letras'], ['cadena letras']], ...['serie', 'cadena']), "contains true");
        $this->assertTrue(CollectionValidation::isValueContainingAny([['cola'], ['pila']], ...['cola', 'pila']), "contains true");
    }
    public function testIsContainingAnyFalse()
    {
        $this->assertFalse(CollectionValidation::isValueContainingAny([['Cadena numeros'], ['Cadena letras']], 'numeros', 'palabras'), "contains true");
        $this->assertFalse(CollectionValidation::isValueContainingAny([['Cadena numeros'], ['Cadena letras']], ...['numeros', 'palabras']), "contains true");
    }
*/
    public function testIsKeyContainingAnyTrue()
    {
        $this->assertTrue(CollectionValidation::isKeyContainingAny([['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras']], 'nombre', 'apellidos'), "contains false");
        $this->assertTrue(CollectionValidation::isKeyContainingAny([['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras']], ...['nombre', 'apellidos']), "contains false");
    }
    public function testIsKeyContainingAnyFalse()
    {
        $this->assertFalse(CollectionValidation::isKeyContainingAny([['nombre' => 'Cadena numeros', 'apellido' => 'Cadena letras']], 'numeros', 'palabras'), "contains false");
        $this->assertFalse(CollectionValidation::isKeyContainingAny([['nombre' => 'Cadena numeros', 'apellido' => 'Cadena letras']], ...['numeros', 'palabras']), "contains false");
    }

    public function testIsValueValidatingTrue()
    {
        $this->assertTrue(CollectionValidation::isValueAttributeValidating([["email" => "aaaa@bbb.com"], ["email" => "bbb@ccc.es"]], "email",(new StringValidations())->isEmail()), "All values are emails");
    }

    public function testIsValueValidatingFalse()
    {
        $this->assertFalse(CollectionValidation::isValueAttributeValidating([["email" => "aaaa@bbb.com"], ["email" => "bbb@ccc.es"], [""]], "email", (new StringValidations())->isEmail()), "All values are not emails");
    }

    public function testIsValueValidatingAnyTrue()
    {
        $this->assertTrue(CollectionValidation::isValueAttributeValidatingAny([["email" => "aaaa@bbb.com"], ["email" => "bbb@ccc.es"], ["email" => ""]], "email", (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "All values are emails or empty");
        //$this->markTestSkipped();
    }

    public function testIsValueValidatingAnyFalse()
    {
        $this->assertFalse(CollectionValidation::isValueAttributeValidatingAny([["email" => "aaaa@bbb.com"], ["email" => "bbb@ccc.es"], ["email" => "a"]], "email", (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "All values are emails or empty failing");
    }
    public function testIsEntiyValidatingTrue()
    {
        $this->assertTrue(CollectionValidation::isValueAttributeValidating([
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
        $this->assertFalse(CollectionValidation::isValueAttributeValidating([
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
        $this->assertTrue(CollectionValidation::isValueAttributeValidating([
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
        $this->assertFalse(CollectionValidation::isValueAttributeValidatingAny([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => ""]
        ], 'url', (new StringValidations())->isUrl()), "Don't all values are urls");
    }
}