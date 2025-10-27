<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Iterables\IterableValidations;
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
}