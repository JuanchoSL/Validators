<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Integers\IntegerValidations;
use JuanchoSL\Validators\Types\Iterables\IterableValidations;
use JuanchoSL\Validators\Types\Numbers\NumberValidations;
use JuanchoSL\Validators\Types\Strings\StringValidations;
use PHPUnit\Framework\TestCase;

class IterableMultipleTest extends TestCase
{

    protected $validator;

    public function setUp(): void
    {
        $this->validator = new IterableValidations();
    }
    public function testLongIterable()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertTrue($this->validator->getResult(str_split('pepeillo surname')));
    }

    public function testLongIterableFail()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($this->validator->getResult(str_split('pepeillo')));
    }
    public function testIsKeyContainingAnyTrue()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isKeyContainingAny(...['nombre', 'apellidos']);

        $this->assertTrue($this->validator->getResult(['nombre' => 'Cadena numeros', 'apellidos' => 'Cadena letras']), "contains true");
    }
    public function testIsKeyContainingAnyFalse()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isKeyContainingAny('numeros', 'palabras');

        $this->assertFalse($this->validator->getResult(['nombre' => 'Cadena numeros', 'apellido' => 'Cadena letras']), "contains false");
    }

    public function testValueValidatingOk()
    {
        $datas = ["aaaa@bbb.com", "bbb@ccc.es"];
        $this->validator->isValueValidating((new StringValidations())->isEmail());

        $this->assertTrue($this->validator->getResult($datas), "complex validations");
    }

    public function testValueValidatingKo()
    {
        $datas = ["aaaa@bbb.com", "bbb@ccc.es", ""];
        $this->validator->isValueValidating((new StringValidations())->isEmail());

        $this->assertFalse($this->validator->getResult($datas), "complex validations");
    }
    public function testValueValidatingAnyOk()
    {
        $datas = ["aaaa@bbb.com", "bbb@ccc.es", ""];
        $this->validator->isValueValidatingAny((new StringValidations())->isEmpty(), (new StringValidations())->isEmail());

        $this->assertTrue($this->validator->getResult($datas), "complex validations");
    }
    public function testEntitiesValidatingOk()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
        ];
        $this->validator->isEntityValidating('email', (new StringValidations())->isEmail());
        $this->validator->isEntityValidating('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

        $this->assertTrue($this->validator->getResult($datas), "complex validations");
    }
    public function testEntitiesValidatingKo()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc", "telephone" => 123456789],
        ];
        $this->validator->isEntityValidating('email', (new StringValidations())->isEmail());
        $this->validator->isEntityValidating('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

        $this->assertFalse($this->validator->getResult($datas), "complex validations");
    }
    public function testEntitiesValidatingAnyOk()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
        ];
        $this->validator->isEntityValidatingAny('email', (new StringValidations())->isEmpty(), (new StringValidations())->isEmail());
        //$this->validator->isEntityValidatingAny('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

        $this->assertTrue($this->validator->getResult($datas), "complex validations");
    }
    public function testEntitiesValidatingAnyKo()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc", "telephone" => 123456789],
        ];
        $this->validator->isEntityValidatingAny('email', (new StringValidations())->isEmpty(), (new StringValidations())->isEmail());
        $this->validator->isEntityValidatingAny('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

        $this->assertFalse($this->validator->getResult($datas), "complex validations");
    }
    /*

public function testComplexEntitiesIndexFalse()
{
$datas = [
    ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
    ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
];
$this->validator->isValueValidating((new IterableValidations())->isKeyContainingAny(...['gorrion', 'golondrino']));
$this->validator->isValueValidating((new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12), 'telephone');

$this->assertFalse($this->validator->getResult($datas), "complex validations");
}

public function testComplexEntitiesValueNumberFalse()
{
$datas = [
    ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 1234567890123456789],
    ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
];
$this->validator->isValueValidating((new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12), 'telephone');

$this->assertFalse($this->validator->getResult($datas), "complex validations");
}
*/
}