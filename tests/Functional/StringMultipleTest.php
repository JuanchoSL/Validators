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

    public function testIsNumberTrue()
    {
        $this->assertTrue($this->validator->isNumber()->getResult("12345.6789"), "Is a number");
        $this->assertTrue($this->validator->isNumber()->getResult("0.123456789"), "Is a number");
        $this->assertTrue($this->validator->isNumber()->getResult(12345.6789), "Is a number");
        $this->assertTrue($this->validator->isNumber()->getResult(0.123456789), "Is a number");
        $this->assertTrue($this->validator->isNumber()->getResult("12345"), "Is a number");
        $this->assertTrue($this->validator->isNumber()->getResult("123456789"), "Is a number");
        $this->assertTrue($this->validator->isNumber()->getResult(12345), "Is a number");
        $this->assertTrue($this->validator->isNumber()->getResult(123456789), "Is a number");
    }
    public function testIsNumberFalse()
    {
        $this->assertFalse($this->validator->isNumber()->getResult("12345.6789€"), "Is not a number");
        $this->assertFalse($this->validator->isNumber()->getResult("0.123456789€"), "Is not a number");
        $this->assertFalse($this->validator->isNumber()->getResult("6789€"), "Is not a number");
        $this->assertFalse($this->validator->isNumber()->getResult("123456789€"), "Is not a number");
    }
    public function testIsIntegerTrue()
    {
        $this->assertTrue($this->validator->isInteger()->getResult("12345"), "Is an integer");
        $this->assertTrue($this->validator->isInteger()->getResult("123456789"), "Is an integer");
        $this->assertTrue($this->validator->isInteger()->getResult(12345), "Is an integer");
        $this->assertTrue($this->validator->isInteger()->getResult(123456789), "Is an integer");
    }
    public function testIsIntegerFalse()
    {
        $this->assertFalse($this->validator->isInteger()->getResult("12345.6789€"), "Is not an integer");
        $this->assertFalse($this->validator->isInteger()->getResult("0.123456789€"), "Is not an integer");
    }
    public function testIsFloatTrue()
    {
        $this->assertTrue($this->validator->isFloat()->getResult(12345.6789), "Is a float");
        $this->assertTrue($this->validator->isFloat()->getResult(0.123456789), "Is a float");
        $this->assertTrue($this->validator->isFloat()->getResult("12345.6789"), "Is a float");
        $this->assertTrue($this->validator->isFloat()->getResult("0.123456789"), "Is a float");
    }
    public function testIsFloatFalse()
    {
        $this->assertFalse($this->validator->isFloat()->getResult("12345.6789€"), "Is not a float");
        $this->assertFalse($this->validator->isFloat()->getResult("0.123456789€"), "Is not a float");
    }

    public function testLongString()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertTrue($this->validator->getResult('pepeillo surname'));
        $this->assertTrue($this->validator->__invoke('pepeillo surname'));
        $this->assertTrue($validator('pepeillo surname'));
    }

    public function testLongStringFail()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15);

        $this->assertFalse($this->validator->getResult('pepeillo'));
        $this->assertFalse($this->validator->__invoke('pepeillo'));
        $this->assertFalse($validator('pepeillo'));
    }

    public function testLongEmail()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isEmail();

        $this->assertTrue($this->validator->getResult('pepeillo@mydomain.com'));
        $this->assertTrue($this->validator->__invoke('pepeillo@mydomain.com'));
        $this->assertTrue($validator('pepeillo@mydomain.com'));
    }

    public function testLongEmails()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isEmail();

        foreach (['pepeillo@mydomain.com', 'manolete@mydomain.com'] as $email) {
            $this->assertTrue($this->validator->getResult($email));
            $this->assertTrue($this->validator->__invoke($email));
            $this->assertTrue($validator($email));
        }
    }

    public function testLongDomain()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isDomain();

        $this->assertTrue($this->validator->getResult('mylongdomain.com'));
        $this->assertTrue($this->validator->__invoke('mylongdomain.com'));
        $this->assertTrue($validator('mylongdomain.com'));
    }

    public function testLongUrl()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isLengthGreatherThan(15)
            ->isUrl();

        $this->assertTrue($this->validator->getResult('https://mylongdomain.com'));
        $this->assertTrue($this->validator->__invoke('https://mylongdomain.com'));
        $this->assertTrue($validator('https://mylongdomain.com'));
    }

    public function testStartTrue()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueStartingWith('start');
        $this->assertTrue($this->validator->getResult('starts string true'));
        $this->assertTrue($this->validator->__invoke('starts string true'));
        $this->assertTrue($validator('starts string true'));
    }

    public function testStartAnyTrue()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueStartingWithAny('start', 'going');
        $this->assertTrue($this->validator->getResult('starts string true'));
        $this->assertTrue($this->validator->__invoke('starts string true'));
        $this->assertTrue($validator('starts string true'));
    }

    public function testStartFalse()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueStartingWith('starts');
        $this->assertFalse($this->validator->getResult('starting string false'));
        $this->assertFalse($this->validator->__invoke('starting string false'));
        $this->assertFalse($validator('starting string false'));
    }

    public function testEndTrue()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueEndingWith('end');
        $this->assertTrue($this->validator->getResult('going to the end'));
        $this->assertTrue($this->validator->__invoke('going to the end'));
        $this->assertTrue($validator('going to the end'));
    }

    public function testEndAnyTrue()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueEndingWithAny('end', 'ending');
        $this->assertTrue($this->validator->getResult('going to the end'));
        $this->assertTrue($this->validator->__invoke('going to the end'));
        $this->assertTrue($validator('going to the end'));
    }

    public function testEndFalse()
    {
        $validator = $this->validator
            ->is()
            ->isNotEmpty()
            ->isValueEndingWith('end');
        $this->assertFalse($this->validator->getResult('starting string false'));
        $this->assertFalse($this->validator->__invoke('starting string false'));
        $this->assertFalse($validator('starting string false'));
    }


    public function testIsDateStringTrue()
    {
        $this->assertTrue($this->validator->isDate()->getResult("2025-11-30"));
        $this->assertTrue($this->validator->isDate()->getResult("2025/11/30"));
        $this->assertTrue($this->validator->isDate()->getResult("30-11-2025"));
        $this->assertTrue($this->validator->isDate()->getResult("30.11.2025"));
        $this->assertTrue($this->validator->isDate()->getResult("11/30/2025"));
    }

    public function testIsDateStringFalse()
    {
        $this->assertFalse($this->validator->isDate()->getResult("2025.11.30"));
        $this->assertFalse($this->validator->isDate()->getResult("30/11/2025"));
        $this->assertFalse($this->validator->isDate()->getResult("11-30-2025"));
        $this->assertFalse($this->validator->isDate()->getResult("11.30.2025"));
    }

    public function testIsFullDateStringTrue()
    {
        $dates = [
            "Thu, 01 Jan 26 00:00:00 +0000",
            "Thursday, 01-Jan-26 00:00:00 UTC",
            "2026-01-01T00:00:00.000+00:00",
            "2026-01-01T00:00:00+00:00",
            "+2026-01-01T00:00:00+00:00",
        ];
        foreach ($dates as $date) {
            $this->assertTrue($this->validator->isDate()->getResult($date));
        }
    }

    public function testIsMultibyteStringTrue()
    {
        $strings = [
            "áeiou",
            "aéiou",
            "aeíou",
            "aeióu",
            "aeioú",
            "äeiou",
            "aëiou",
        ];
        foreach ($strings as $string) {
            $this->assertTrue($this->validator->isMultibyte()->getResult($string));
        }
    }
    public function testIsMultibyteStringFalse()
    {
        $strings = [
            "aeiou",
            "bcdef",
        ];
        foreach ($strings as $string) {
            $this->assertFalse($this->validator->isMultibyte()->getResult($string));
        }
    }
}