<?php

namespace JuanchoSL\Validators\Tests\Unit;

use JuanchoSL\Validators\Types\Primitives\PrimitiveValidation;
use PHPUnit\Framework\TestCase;

class PrimitiveTest extends TestCase
{

    public function testIsRealPrimitive()
    {
        $this->assertTrue(PrimitiveValidation::is(null), "Is a null");
        $this->assertTrue(PrimitiveValidation::is(true), "Is a true");
        $this->assertTrue(PrimitiveValidation::is(false), "Is a false");
    }

    public function testIsNotRealPrimitive()
    {
        $this->assertFalse(PrimitiveValidation::is('null'), "Is a string null");
        $this->assertFalse(PrimitiveValidation::is('true'), "Is a string true");
        $this->assertFalse(PrimitiveValidation::is('false'), "Is a string false");
        $this->assertFalse(PrimitiveValidation::is('0'), "Is a string 0");
        $this->assertFalse(PrimitiveValidation::is('1'), "Is a string 1");
    }

    public function testisBoolEquivalentPrimitiveTrue()
    {
        $this->assertTrue(PrimitiveValidation::isBoolEquivalent('true'), "Is a string true");
        $this->assertTrue(PrimitiveValidation::isBoolEquivalent('on'), "Is a string on");
        $this->assertTrue(PrimitiveValidation::isBoolEquivalent('yes'), "Is a string yes");
        $this->assertTrue(PrimitiveValidation::isBoolEquivalent('1'), "Is a string 1");
        $this->assertTrue(PrimitiveValidation::isBoolEquivalent(''), "Is a string empty");
        $this->assertTrue(PrimitiveValidation::isBoolEquivalent('false'), "Is a string false");
        $this->assertTrue(PrimitiveValidation::isBoolEquivalent('off'), "Is a string off");
        $this->assertTrue(PrimitiveValidation::isBoolEquivalent('no'), "Is a string no");
        $this->assertTrue(PrimitiveValidation::isBoolEquivalent('0'), "Is a string 0");
    }
    
    public function testisBoolEquivalentPrimitiveFalse()
    {
        $this->assertFalse(PrimitiveValidation::isBoolEquivalent('correcto'), "Is a random string");
        $this->assertFalse(PrimitiveValidation::isBoolEquivalent(2), "Is a random number");
        $this->assertFalse(PrimitiveValidation::isBoolEquivalent(null), "Is a null real");
        $this->assertFalse(PrimitiveValidation::isBoolEquivalent('null'), "Is a null string");
    }

    public function testIsTrueTrue()
    {
        $this->assertTrue(PrimitiveValidation::isTrue('true'), "Is a string true");
        $this->assertTrue(PrimitiveValidation::isTrue('on'), "Is a string on");
        $this->assertTrue(PrimitiveValidation::isTrue('yes'), "Is a string yes");
        $this->assertTrue(PrimitiveValidation::isTrue('1'), "Is a string 1");
    }

    public function testIsTrueFalse()
    {
        $this->assertFalse(PrimitiveValidation::isTrue(''), "Is a string empty");
        $this->assertFalse(PrimitiveValidation::isTrue('false'), "Is a string false");
        $this->assertFalse(PrimitiveValidation::isTrue('off'), "Is a string off");
        $this->assertFalse(PrimitiveValidation::isTrue('no'), "Is a string no");
        $this->assertFalse(PrimitiveValidation::isTrue('0'), "Is a string 0");
    }

    public function testIsFalseTrue()
    {
        $this->assertTrue(PrimitiveValidation::isFalse(''), "Is a string empty");
        $this->assertTrue(PrimitiveValidation::isFalse('false'), "Is a string false");
        $this->assertTrue(PrimitiveValidation::isFalse('off'), "Is a string off");
        $this->assertTrue(PrimitiveValidation::isFalse('no'), "Is a string no");
        $this->assertTrue(PrimitiveValidation::isFalse('0'), "Is a string 0");
    }

    public function testIsFalseFalse()
    {
        $this->assertFalse(PrimitiveValidation::isFalse('true'), "Is a string true");
        $this->assertFalse(PrimitiveValidation::isFalse('on'), "Is a string on");
        $this->assertFalse(PrimitiveValidation::isFalse('yes'), "Is a string yes");
        $this->assertFalse(PrimitiveValidation::isFalse('1'), "Is a string 1");
    }
}