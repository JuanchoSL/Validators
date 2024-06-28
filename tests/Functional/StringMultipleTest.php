<?php

namespace JuanchoSL\Validators\Tests\Functional;

use JuanchoSL\Validators\Types\Strings\StringValidations;
use PHPUnit\Framework\TestCase;

class StringMultipleTest extends TestCase
{

    protected $validator;

    public function setUp(): void
    {
        $this->validator = new StringValidations();
    }
    public function testLongString()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertTrue($this->validator->getResult('pepeillo surname'));
    }

    public function testLongStringFail()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($this->validator->getResult('pepeillo'));
    }

    public function testLongEmail()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isEmail();

        $this->assertTrue($this->validator->getResult('pepeillo@mydomain.com'));
    }

    public function testLongEmails()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isEmail();

        foreach (['pepeillo@mydomain.com', 'manolete@mydomain.com'] as $email) {
            $this->assertTrue($this->validator->getResult($email));
        }
    }

    public function testLongDomain()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isDomain();

        $this->assertTrue($this->validator->getResult('mylongdomain.com'));
    }

    public function testLongUrl()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isUrl();

        $this->assertTrue($this->validator->getResult('https://mylongdomain.com'));
    }
}