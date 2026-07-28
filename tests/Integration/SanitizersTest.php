<?php

namespace JuanchoSL\Validators\Tests\Integration;

use JuanchoSL\DataManipulation\Manipulators\Numbers\NumbersManipulators;
use JuanchoSL\DataManipulation\Sanitizers\Numbers\NumberSanitizers;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class SanitizersTest extends TestCase
{

    public function testNumberSanitizer()
    {
        $reflector = new ReflectionClass(NumberSanitizers::class);
        $this->assertTrue($reflector->hasMethod('integer'), "NumberSanitizer have method integer");
        $this->assertTrue($reflector->hasMethod('__invoke'), "NumberSanitizer have method __invoke");
    }

    public function testNumberManipulator()
    {
        $reflector = new ReflectionClass(NumbersManipulators::class);
        $this->assertTrue($reflector->hasMethod('sub'), "NumberManipulator have method sub");
        $this->assertTrue($reflector->hasMethod('absolute'), "NumberManipulator have method absolute");
        $this->assertTrue($reflector->hasMethod('roundHalfUp'), "NumberManipulator have method roundHalfUp");
    }
}