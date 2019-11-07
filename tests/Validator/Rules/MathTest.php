<?php

declare(strict_types=1);

namespace Tests\Validator\Rules;

use JozefGrencik\Validator\Validator;
use PHPUnit\Framework\TestCase;

class MathTest extends TestCase
{

    /**
     * Tests for Validator::math()->prime()
     * @throws \Exception
     */
    public function testPrime()
    {
        //good: 2, 3, 5, 7, 11, 13, 17, 19, 23, 29, 31, 37, 41, 43, 47, 53, 59, 61, 67, 71, 73, 79, 83, 89, 97
        $validator = Validator::math()->prime();

        $this->assertFalse($validator->isValid(-5));
        $this->assertFalse($validator->isValid(-4));
        $this->assertFalse($validator->isValid(-3));
        $this->assertFalse($validator->isValid(-2));
        $this->assertFalse($validator->isValid(-1));
        $this->assertFalse($validator->isValid(0));
        $this->assertFalse($validator->isValid(1));
        $this->assertTrue($validator->isValid(2));
        $this->assertTrue($validator->isValid(3));
        $this->assertFalse($validator->isValid(4));
        $this->assertTrue($validator->isValid(5));
        $this->assertFalse($validator->isValid(6));
        $this->assertTrue($validator->isValid(7));
        $this->assertFalse($validator->isValid(8));
        $this->assertFalse($validator->isValid(9));
        $this->assertFalse($validator->isValid(10));
        $this->assertTrue($validator->isValid(11));
        $this->assertFalse($validator->isValid(12));
        $this->assertTrue($validator->isValid(13));
        $this->assertFalse($validator->isValid(14));
        $this->assertFalse($validator->isValid(15));
        $this->assertFalse($validator->isValid(16));
        $this->assertTrue($validator->isValid(17));
        $this->assertFalse($validator->isValid(18));
        $this->assertTrue($validator->isValid(19));
        $this->assertFalse($validator->isValid(20));
        $this->assertTrue($validator->isValid(3001));
        $this->assertFalse($validator->isValid(3002));
        $this->assertFalse($validator->isValid(3003));
        $this->assertFalse($validator->isValid(3004));
        $this->assertTrue($validator->isValid(982451653));
    }
}