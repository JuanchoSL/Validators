<?php

namespace JuanchoSL\Validators\Tests\Unit;

use JuanchoSL\Validators\Types\Entities\EntityValidation;
use JuanchoSL\Validators\Types\Strings\StringValidation;
use JuanchoSL\Validators\Types\Strings\StringValidations;
use JuanchoSL\Validators\Types\Integers\IntegerValidations;
use PHPUnit\Framework\TestCase;

class EntityTest extends TestCase
{

public function testKeyEntitiesValidatingOk()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789]
        ];
        foreach ($datas as $data) {
            $this->assertTrue(EntityValidation::isKeyContaining($data, 'email'), "complex validations");
            $this->assertTrue(EntityValidation::isKeyContaining($data, 'nombre'), "complex validations");
        }
    }

    public function testKeyEntitiesValidatingKo()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789]
        ];
        foreach ($datas as $data) {
            $this->assertFalse(EntityValidation::isKeyContaining($data, 'name'), "complex validations");
            $this->assertFalse(EntityValidation::isKeyContaining($data, 'surname'), "complex validations");
        }
    }

    public function testEntitiesValidatingOk()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb.com", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789]
        ];

        foreach ($datas as $data) {
            $this->assertTrue(EntityValidation::isValueAttributeValidating($data, 'email', (new StringValidations())->isEmail()), "complex validations");
            $this->assertTrue(EntityValidation::isValueAttributeValidating($data, 'email', [StringValidation::class, 'isEmail']), "complex validations");
            $this->assertTrue(EntityValidation::isValueAttributeValidating($data, 'telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12)), "complex validations");
        }
        $datas = json_decode(json_encode($datas), false);
        foreach ($datas as $data) {
            $this->assertTrue(EntityValidation::isValueAttributeValidating($data, 'email', (new StringValidations())->isEmail()), "complex validations");
            $this->assertTrue(EntityValidation::isValueAttributeValidating($data, 'email', [StringValidation::class, 'isEmail']), "complex validations");
            $this->assertTrue(EntityValidation::isValueAttributeValidating($data, 'telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12)), "complex validations");
        }
    }

    public function testEntitiesValidatingKo()
    {

        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbbcom", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc", "telephone" => 123456789]
        ];

        foreach ($datas as $data) {
            $this->assertFalse(EntityValidation::isValueAttributeValidating($data, 'email', (new StringValidations())->isEmail()), "complex validations");
            $this->assertFalse(EntityValidation::isValueAttributeValidating($data, 'email', [StringValidation::class, 'isEmail']), "complex validations");
            $this->assertFalse(EntityValidation::isValueAttributeValidating($data, 'telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(10)->isLengthLessOrEqualsThan(12)), "complex validations");
        }
        $datas = json_decode(json_encode($datas), false);
        foreach ($datas as $data) {
            $this->assertFalse(EntityValidation::isValueAttributeValidating($data, 'email', (new StringValidations())->isEmail()), "complex validations");
            $this->assertFalse(EntityValidation::isValueAttributeValidating($data, 'email', [StringValidation::class, 'isEmail']), "complex validations");
            $this->assertFalse(EntityValidation::isValueAttributeValidating($data, 'telephone', (new IntegerValidations())->isLengthGreatherOrEqualsThan(10)->isLengthLessOrEqualsThan(12)), "complex validations");
        }
    }

    public function testEntitiesValidatingAnyOk()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc.es", "telephone" => 123456789]
        ];
        foreach ($datas as $data) {
            $this->assertTrue(EntityValidation::isValueAttributeValidatingAny($data, 'email', (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "complex validations");
            $this->assertTrue(EntityValidation::isValueAttributeValidatingAny($data, 'email', [StringValidation::class, 'isEmpty'], (new StringValidations())->isEmail()), "complex validations");
            $this->assertTrue(EntityValidation::isValueAttributeValidatingAny($data, 'telephone', [StringValidation::class, 'isEmpty'], (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12)), "complex validations");
        }
        $datas = json_decode(json_encode($datas), false);
        
        foreach ($datas as $data) {
            $this->assertTrue(EntityValidation::isValueAttributeValidatingAny($data, 'email', (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "complex validations");
            $this->assertTrue(EntityValidation::isValueAttributeValidatingAny($data, 'email', [StringValidation::class, 'isEmpty'], (new StringValidations())->isEmail()), "complex validations");
            $this->assertTrue(EntityValidation::isValueAttributeValidatingAny($data, 'telephone', [StringValidation::class, 'isEmpty'], (new IntegerValidations())->isLengthGreatherOrEqualsThan(9)->isLengthLessOrEqualsThan(12)), "complex validations");
        }
    }
    
    public function testEntitiesValidatingAnyKo()
    {
        $datas = [
            ["nombre" => "pepe", "apellidos" => "salmuera", "email" => "aaaa@bbb", "telephone" => 123456789],
            ["nombre" => "juan", "apellidos" => "benito", "email" => "bbb@ccc", "telephone" => 123456789]
        ];

        foreach ($datas as $data) {
            $this->assertFalse(EntityValidation::isValueAttributeValidatingAny($data, 'email', (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "complex validations");
            $this->assertFalse(EntityValidation::isValueAttributeValidatingAny($data, 'email', [StringValidation::class, 'isEmpty'], (new StringValidations())->isEmail()), "complex validations");
            $this->assertFalse(EntityValidation::isValueAttributeValidatingAny($data, 'telephone', [StringValidation::class, 'isEmpty'], (new IntegerValidations())->isLengthGreatherOrEqualsThan(10)->isLengthLessOrEqualsThan(12)), "complex validations");
        }
            
        $datas = json_decode(json_encode($datas), false);
        foreach ($datas as $data) {
            $this->assertFalse(EntityValidation::isValueAttributeValidatingAny($data, 'email', (new StringValidations())->isEmpty(), (new StringValidations())->isEmail()), "complex validations");
            $this->assertFalse(EntityValidation::isValueAttributeValidatingAny($data, 'email', [StringValidation::class, 'isEmpty'], (new StringValidations())->isEmail()), "complex validations");
            $this->assertFalse(EntityValidation::isValueAttributeValidatingAny($data, 'telephone', [StringValidation::class, 'isEmpty'], (new IntegerValidations())->isLengthGreatherOrEqualsThan(10)->isLengthLessOrEqualsThan(12)), "complex validations");
        }

    }
}