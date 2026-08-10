<?php

namespace JuanchoSL\Validators\Tests\Funtional;


use JuanchoSL\Exceptions\PreconditionFailedException;
use JuanchoSL\Validators\Types\Iterables\CollectionValidations;
use JuanchoSL\Validators\Types\Strings\StringValidations;
use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{

    protected $validator;

    public function setUp(): void
    {
        $this->validator = new CollectionValidations();
    }
    public function testIsCollectionTrue()
    {
        $this->assertTrue($this->validator->is()->__invoke([["email"=>"text collection"]]), "Is a collection");
        $this->assertTrue($this->validator->is()->__invoke([]), "Is a collection");
    }
    public function testIsCollectionFalse()
    {
        $this->assertFalse($this->validator->is()->__invoke(["text collection"]), "Is not a collection");
        $this->assertFalse($this->validator->is()->__invoke(123456), "Is not a collection");
        $this->assertFalse($this->validator->is()->__invoke(false), "Is not a collection");
        $this->assertFalse($this->validator->is()->__invoke(true), "Is not a collection");
        $this->assertFalse($this->validator->is()->__invoke(null), "Is not a collection");
    }
    public function testIsEmptyTrue()
    {
        $this->assertTrue($this->validator->isEmpty()->__invoke([]), "Is an empty collection");
    }
    public function testIsEmptyError()
    {
        $this->expectException(PreconditionFailedException::class);
        $this->assertFalse($this->validator->isEmpty()->__invoke(false), "Is not not a collection");
        $this->assertFalse($this->validator->isLengthEqualsThan(5)->__invoke(''), "Is not not a collection");
        $this->assertFalse($this->validator->isEmpty()->__invoke(['collection']), "Is not an empty collection");
        $this->assertFalse($this->validator->isEmpty()->__invoke([null]), "Is not an empty collection");
        $this->assertFalse($this->validator->isEmpty()->__invoke([['collection']]), "Is not an empty collection");
        $this->assertFalse($this->validator->isEmpty()->__invoke([[0]]), "Is not an empty collection");
        $this->assertFalse($this->validator->isEmpty()->__invoke([[false]]), "Is not an empty collection");
    }
    public function testIsNotEmptyTrue()
    {
        $this->assertTrue($this->validator->isNotEmpty()->__invoke([["email"=>'collection']]), "Is not an empty collection");
    }
    public function testIsNotEmptyFalse()
    {
        $this->assertFalse($this->validator->isNotEmpty()->__invoke([]), "Is an empty collection");
    }
    public function testIsNotEmptyError()
    {
        $this->expectException(PreconditionFailedException::class);
        $this->assertFalse($this->validator->isNotEmpty()->__invoke(null), "Is not not a collection");
        $this->assertFalse($this->validator->isNotEmpty()->__invoke(false), "Is not not a collection");
    }

    public function testIsLengthEqualsTrue()
    {
        $this->assertTrue($this->validator->isLengthEqualsThan(11)->__invoke(array_fill(0, 11, ["val"=>''])), "Is a collection with a length equals to 9");
    }
    public function testIsLengthEqualsFalse()
    {
        $this->assertFalse($this->validator->isLengthEqualsThan(10)->__invoke(array_fill(0, 11, ["val"=>''])), "Is not a string with a length equals to 10");
    }

    public function testIsLengthGreatherThanTrue()
    {
        $this->assertTrue($this->validator->isLengthGreatherThan(10)->__invoke(array_fill(0, 11, ["val"=>''])), "Is a string with a length greather than 10");
    }

    public function testIsLengthGreatherThanFalse()
    {
        $this->assertFalse($this->validator->isLengthGreatherThan(15)->__invoke(array_fill(0, 11, ["val"=>''])), "Is not a string with a length greather than 10");
        $this->assertFalse($this->validator->isLengthGreatherThan(11)->__invoke(array_fill(0, 11, ["val"=>''])), "Is not a string with a length greather than 11");
    }

    public function testIsLengthGreatherOrEqualsThanTrue()
    {
        $this->assertTrue($this->validator->isLengthGreatherOrEqualsThan(10)->__invoke(array_fill(0, 11, ["val"=>''])), "Is a string with a length greather than 10");
        $this->assertTrue($this->validator->isLengthGreatherOrEqualsThan(11)->__invoke(array_fill(0, 11, ["val"=>''])), "Is a string with a length equals than 11");
    }

    public function testIsLengthGreatherOrEqualsThanFalse()
    {
        $this->assertFalse($this->validator->isLengthGreatherOrEqualsThan(15)->__invoke(array_fill(0, 11, ["val"=>''])), "Is not a string with length greather or equals than 15");
    }

    public function testIsLengthLessOrEqualsThanTrue()
    {
        $this->assertTrue($this->validator->isLengthLessOrEqualsThan(15)->__invoke(array_fill(0, 11, ["val"=>''])), "Is a string with a length less than 15");
        $this->assertTrue($this->validator->isLengthLessOrEqualsThan(11)->__invoke(array_fill(0, 11, ["val"=>''])), "Is a string with a length less than 11");
    }

    public function testIsLengthLessOrEqualsThanFalse()
    {
        $this->assertFalse($this->validator->isLengthLessOrEqualsThan(10)->__invoke(array_fill(0, 11, ["val"=>''])), "Is not a string with length less than 10");
    }

    public function testIsLengthLessThanTrue()
    {
        $this->assertTrue($this->validator->isLengthLessThan(15)->__invoke(array_fill(0, 11, ["val"=>''])), "Is a string with a length less than 15");
        $this->assertTrue($this->validator->isLengthLessThan(12)->__invoke(array_fill(0, 11, ["val"=>''])), "Is a string with a length less than 12");
    }

    public function testIsLengthLessThanFalse()
    {
        $this->assertFalse($this->validator->isLengthLessThan(10)->__invoke(array_fill(0, 11, ["val"=>''])), "Is not a string with length less than 10");
    }
    /*
    public function testIsContainingTrue()
    {
        $this->assertTrue($this->validator->isValueContaining([['Cadena numeros'], ['Cadena letras']], 'Cadena'), "contains true");
        $this->assertTrue($this->validator->isValueContaining([['serie letras'], ['cadena letras']], 'letras'), "contains true");
        $this->assertTrue($this->validator->isValueContaining([['cola'], ['pila']], 'la'), "contains true");
    }
    public function testIsContainingFalse()
    {
        $this->assertFalse($this->validator->isValueContaining(['Cadena', 'origina'], 'original'), "contains false");
        $this->assertFalse($this->validator->isValueContaining([' Cadena', 'original'], 'Original'), "contains false");
        $this->assertFalse($this->validator->isValueContaining(['origina'], 'original'), "contains false");
    }
    public function testIsContainingAnyTrue()
    {
        $this->assertTrue($this->validator->isValueContainingAny([['Cadena numeros'], ['Cadena letras']], 'numeros', 'letras'), "contains true");
        $this->assertTrue($this->validator->isValueContainingAny([['Cadena numeros'], ['Cadena letras']], 'Cadena', 'palabras'), "contains true");
        $this->assertTrue($this->validator->isValueContainingAny([['serie letras'], ['cadena letras']], 'serie', 'cadena'), "contains true");
        $this->assertTrue($this->validator->isValueContainingAny([['cola'], ['pila']], 'cola', 'pila'), "contains true");

        $this->assertTrue($this->validator->isValueContainingAny([['Cadena numeros'], ['Cadena letras']], ...['numeros', 'letras']), "contains true");
        $this->assertTrue($this->validator->isValueContainingAny([['Cadena numeros'], ['Cadena letras']], ...['Cadena', 'palabras']), "contains true");
        $this->assertTrue($this->validator->isValueContainingAny([['serie letras'], ['cadena letras']], ...['serie', 'cadena']), "contains true");
        $this->assertTrue($this->validator->isValueContainingAny([['cola'], ['pila']], ...['cola', 'pila']), "contains true");
    }
    public function testIsContainingAnyFalse()
    {
        $this->assertFalse($this->validator->isValueContainingAny([['Cadena numeros'], ['Cadena letras']], 'numeros', 'palabras'), "contains true");
        $this->assertFalse($this->validator->isValueContainingAny([['Cadena numeros'], ['Cadena letras']], ...['numeros', 'palabras']), "contains true");
    }
*/
    public function testIsKeyContainingAnyTrue()
    {
        $this->assertTrue($this->validator->isKeyContainingAny('nombre', 'apellidos')->__invoke([['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras']]), "contains false");
        $this->assertTrue($this->validator->isKeyContainingAny(...['nombre', 'apellidos'])->__invoke([['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras']]), "contains false");
    }
    public function testIsKeyContainingAnyFalse()
    {
        $this->assertFalse($this->validator->isKeyContainingAny('numeros', 'palabras')->__invoke([['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras']]), "contains false");
        $this->assertFalse($this->validator->isKeyContainingAny(...['numeros', 'palabras'])->__invoke([['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras']]), "contains false");
    }

    public function testIsValueValidatingTrue()
    {
        $this->assertTrue($this->validator->isValueAttributeValidating("email",(new StringValidations())->isEmail())->__invoke([["email"=>"aaaa@bbb.com"], ["email"=>"bbb@ccc.es"]]), "All values are emails");
    }

    public function testIsValueValidatingFalse()
    {
        $this->assertFalse($this->validator->isValueAttributeValidating("email",(new StringValidations())->isEmail())->__invoke([["email"=>"aaaa@bbb.com"], ["email"=>"bbb@ccc.es"], ['']]), "All values are not emails");
    }

    public function testIsValueValidatingAnyTrue()
    {
        $this->assertTrue($this->validator->isValueAttributeValidatingAny("email",(new StringValidations())->isEmpty(), (new StringValidations())->isEmail())->__invoke([["email"=>"aaaa@bbb.com"], ["email"=>"bbb@ccc.es"], ["email"=>""]]), "All values are emails or empty");
        //$this->markTestSkipped();
    }

    public function testIsValueValidatingAnyFalse()
    {
        $this->assertFalse($this->validator->isValueAttributeValidatingAny("email",(new StringValidations())->isEmpty(), (new StringValidations())->isEmail())->__invoke([["email"=>"aaaa@bbb.com"], ["email"=>"bbb@ccc.es"], "a"]), "All values are emails or empty failing");
    }
    public function testIsEntiyValidatingTrue()
    {
        $this->assertTrue($this->validator->isValueAttributeValidating('url', (new StringValidations())->isUrl())->__invoke([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => "https://www.url.com/index.php"]
        ]), "All values at index url are urls");
    }

    public function testIsEntiyValidatingFalse()
    {
        $this->assertFalse($this->validator->isValueAttributeValidating('url', (new StringValidations())->isUrl())->__invoke([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => ""]
        ]), "Don't all values are urls");
    }

    public function testIsEntiyValidatingAnyTrue()
    {
        $this->assertTrue($this->validator->isValueAttributeValidating('url', (new StringValidations())->isUrl())->__invoke([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => "https://www.url.com/index.php"]
        ]), "All values at index url are urls");
    }

    public function testIsEntiyValidatingAnyFalse()
    {
        $this->assertFalse($this->validator->isValueAttributeValidatingAny('url', (new StringValidations())->isUrl())->__invoke([
            ['url' => "http://url.com"],
            ['url' => "https://url.com"],
            ['url' => "https://www.url.com"],
            ['url' => "ftp://ftp.url.com"],
            ['url' => "ftps://ftp.url.com"],
            ['url' => ""]
        ]), "Don't all values are urls");
    }
}