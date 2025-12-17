<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Entities\EntityValidations;
use JuanchoSL\Validators\Types\Integers\IntegerValidations;
use JuanchoSL\Validators\Types\Iterables\IterableValidations;
use JuanchoSL\Validators\Types\Numbers\NumberValidations;
use JuanchoSL\Validators\Types\Strings\StringValidations;
use PHPUnit\Framework\TestCase;

class EntityMultipleTest extends TestCase
{

    protected $validator;

    public function setUp(): void
    {
        $this->validator = new EntityValidations();
    }

    public function testEntitiesValidatingOk()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
        ];
        $this->validator->isValueAttributeValidating('email', (new StringValidations())->isEmail());
        $this->validator->isValueAttributeValidating('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

        
        foreach ($datas as $data) {
            $this->assertTrue($this->validator->getResult($data), "complex validations");
        }
        $datas = json_decode(json_encode($datas), false);
        foreach ($datas as $data) {
            $this->assertTrue($this->validator->getResult($data), "complex validations");
        }
    }
    public function testEntitiesValidatingKo()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbbcom", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc", "telephone" => 123456789],
        ];
        $this->validator->isValueAttributeValidating('email', (new StringValidations())->isEmail());
        $this->validator->isValueAttributeValidating('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

        foreach ($datas as $data) {
            $this->assertFalse($this->validator->getResult($data), "complex validations");
        }
                $datas = json_decode(json_encode($datas), false);
        foreach ($datas as $data) {
            $this->assertFalse($this->validator->getResult($data), "complex validations");
        }
    }
    public function testEntitiesValidatingAnyOk()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789],
        ];
        $this->validator->isValueAttributeValidatingAny('email', (new StringValidations())->isEmpty(), (new StringValidations())->isEmail());
        //$this->validator->isValueAttributeValidatingAny('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

        foreach ($datas as $data) {
            $this->assertTrue($this->validator->getResult($data), "complex validations");
        }
                $datas = json_decode(json_encode($datas), false);

        foreach ($datas as $data) {
            $this->assertTrue($this->validator->getResult($data), "complex validations");
        }
    }
    public function testEntitiesValidatingAnyKo()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc", "telephone" => 123456789],
        ];
        $this->validator->isValueAttributeValidatingAny('email', (new StringValidations())->isEmpty(), (new StringValidations())->isEmail());
        $this->validator->isValueAttributeValidatingAny('telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12));

        foreach ($datas as $data) {
            $this->assertFalse($this->validator->getResult($data), "complex validations");
        }
        $datas = json_decode(json_encode($datas), false);
        foreach ($datas as $data) {
            $this->assertFalse($this->validator->getResult($data), "complex validations");
        }

    }

}