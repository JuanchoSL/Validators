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

    public function testStartTrue()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueStartingWith('start');
        $this->assertTrue($this->validator->getResult('starts string true'));
    }

    public function testStartAnyTrue()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueStartingWithAny('start', 'going');
        $this->assertTrue($this->validator->getResult('starts string true'));
    }

    public function testStartFalse()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueStartingWith('starts');
        $this->assertFalse($this->validator->getResult('starting string false'));
    }

    public function testEndTrue()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueEndingWith('end');
        $this->assertTrue($this->validator->getResult('going to the end'));
    }

    public function testEndAnyTrue()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueEndingWithAny('end', 'ending');
        $this->assertTrue($this->validator->getResult('going to the end'));
    }

    public function testEndFalse()
    {
        $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueEndingWith('end');
        $this->assertFalse($this->validator->getResult('starting string false'));
    }
}