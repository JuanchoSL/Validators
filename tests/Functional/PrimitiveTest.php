<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Primitives\PrimitiveValidations;
use PHPUnit\Framework\TestCase;

class PrimitiveTest extends TestCase
{

    public function testIsRealPrimitive()
    {
        $this->assertTrue((new PrimitiveValidations)->is()->getResult(null), "Is a null");
        $this->assertTrue((new PrimitiveValidations)->is()->getResult(true), "Is a true");
        $this->assertTrue((new PrimitiveValidations)->is()->getResult(false), "Is a false");
    }

    public function testIsNotRealPrimitive()
    {
        $this->assertFalse((new PrimitiveValidations)->is()->getResult('null'), "Is a string null");
        $this->assertFalse((new PrimitiveValidations)->is()->getResult('true'), "Is a string true");
        $this->assertFalse((new PrimitiveValidations)->is()->getResult('false'), "Is a string false");
        $this->assertFalse((new PrimitiveValidations)->is()->getResult('0'), "Is a string 0");
        $this->assertFalse((new PrimitiveValidations)->is()->getResult('1'), "Is a string 1");
    }

    public function testisBoolEquivalentPrimitiveTrue()
    {
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->getResult('true'), "Is a string true");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->getResult('on'), "Is a string on");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->getResult('yes'), "Is a string yes");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->getResult('1'), "Is a string 1");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->getResult(''), "Is a string empty");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->getResult('false'), "Is a string false");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->getResult('off'), "Is a string off");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->getResult('no'), "Is a string no");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->getResult('0'), "Is a string 0");
    }

    public function testisBoolEquivalentPrimitiveEvaluatingTrue()
    {
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->isTrue()->getResult('true'), "Is a string true");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->isTrue()->getResult('on'), "Is a string on");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->isTrue()->getResult('yes'), "Is a string yes");
        $this->assertTrue((new PrimitiveValidations)->isBoolEquivalent()->isTrue()->getResult('1'), "Is a string 1");
    }
    public function testisBoolEquivalentPrimitiveNotEvaluatingTrue()
    {
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->isTrue()->getResult(''), "Is a string empty");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->isTrue()->getResult('false'), "Is a string false");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->isTrue()->getResult('off'), "Is a string off");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->isTrue()->getResult('no'), "Is a string no");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->isTrue()->getResult('0'), "Is a string 0");
    }
    
    public function testisBoolEquivalentPrimitiveNotEvaluatingFalse()
    {
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->isFalse()->getResult('true'), "Is a string true");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->isFalse()->getResult('on'), "Is a string on");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->isFalse()->getResult('yes'), "Is a string yes");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->isFalse()->getResult('1'), "Is a string 1");
    }

    public function testisBoolEquivalentPrimitiveFalse()
    {
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->getResult('correcto'), "Is a random string");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->getResult(2), "Is a random number");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->getResult(null), "Is a null real");
        $this->assertFalse((new PrimitiveValidations)->isBoolEquivalent()->getResult('null'), "Is a null string");
    }

    public function testIsTrueTrue()
    {
        $this->assertTrue((new PrimitiveValidations)->isTrue()->getResult('true'), "Is a string true");
        $this->assertTrue((new PrimitiveValidations)->isTrue()->getResult('on'), "Is a string on");
        $this->assertTrue((new PrimitiveValidations)->isTrue()->getResult('yes'), "Is a string yes");
        $this->assertTrue((new PrimitiveValidations)->isTrue()->getResult('1'), "Is a string 1");
    }

    public function testIsTrueFalse()
    {
        $this->assertFalse((new PrimitiveValidations)->isTrue()->getResult(''), "Is a string empty");
        $this->assertFalse((new PrimitiveValidations)->isTrue()->getResult('false'), "Is a string false");
        $this->assertFalse((new PrimitiveValidations)->isTrue()->getResult('off'), "Is a string off");
        $this->assertFalse((new PrimitiveValidations)->isTrue()->getResult('no'), "Is a string no");
        $this->assertFalse((new PrimitiveValidations)->isTrue()->getResult('0'), "Is a string 0");
    }

    public function testIsFalseTrue()
    {
        $this->assertTrue((new PrimitiveValidations)->isFalse()->getResult(''), "Is a string empty");
        $this->assertTrue((new PrimitiveValidations)->isFalse()->getResult('false'), "Is a string false");
        $this->assertTrue((new PrimitiveValidations)->isFalse()->getResult('off'), "Is a string off");
        $this->assertTrue((new PrimitiveValidations)->isFalse()->getResult('no'), "Is a string no");
        $this->assertTrue((new PrimitiveValidations)->isFalse()->getResult('0'), "Is a string 0");
    }

    public function testIsFalseFalse()
    {
        $this->assertFalse((new PrimitiveValidations)->isFalse()->getResult('true'), "Is a string true");
        $this->assertFalse((new PrimitiveValidations)->isFalse()->getResult('on'), "Is a string on");
        $this->assertFalse((new PrimitiveValidations)->isFalse()->getResult('yes'), "Is a string yes");
        $this->assertFalse((new PrimitiveValidations)->isFalse()->getResult('1'), "Is a string 1");
    }
}