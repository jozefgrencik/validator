<?php
declare(strict_types=1);

namespace Tests\Validator\Rules;

use JozefGrencik\Validator\Exceptions\InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use JozefGrencik\Validator\Validator;

class StringsTest extends TestCase {

    /**
     * Tests for Validator::string()->length()
     * @throws \Exception
     */
    public function testLength() {
        $wasException = FALSE;
        try {
            Validator::string()->length(-1);
        } catch (InvalidArgumentException $exception) {
            $wasException = TRUE;
        }
        $this->assertTrue($wasException);

        $validator = Validator::string()->length(0);
        $this->assertTrue($validator->isValid(''));
        $this->assertFalse($validator->isValid(' '));
        $this->assertFalse($validator->isValid('č'));
        $this->assertFalse($validator->isValid('0'));
        $this->assertFalse($validator->isValid('lorem'));

        $validator = Validator::string()->length(1);
        $this->assertFalse($validator->isValid(''));
        $this->assertTrue($validator->isValid(' '));
        $this->assertTrue($validator->isValid('č'));
        $this->assertTrue($validator->isValid('0'));
        $this->assertFalse($validator->isValid('lorem'));

        $validator = Validator::string()->length(5);
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid(' '));
        $this->assertFalse($validator->isValid('č'));
        $this->assertFalse($validator->isValid('0'));
        $this->assertTrue($validator->isValid('lorem'));
    }

    /**
     * Tests for Validator::string()->notEmpty()
     * @throws \Exception
     */
    public function testNotEmpty() {
        $validator = Validator::string()->notEmpty();

        //false
        $this->assertFalse($validator->isValid(''));

        //true
        $this->assertTrue($validator->isValid(' '));
        $this->assertTrue($validator->isValid('a'));
        $this->assertTrue($validator->isValid('0'));
        $this->assertTrue($validator->isValid('č'));
    }

    /**
     * Tests for Validator::string()->lengthBetween()
     * @throws \Exception
     */
    public function testLengthBetween() {

    }

    /**
     * Tests for Validator::string()->maxLength()
     * @throws \Exception
     */
    public function testMaxLength() {
        $wasException = FALSE;
        try {
            Validator::string()->maxLength(-1);
        } catch (InvalidArgumentException $exception) {
            $wasException = TRUE;
        }
        $this->assertTrue($wasException);

        $validator = Validator::string()->maxLength(0);
        $this->assertTrue($validator->isValid(''));
        $this->assertFalse($validator->isValid(' '));
        $this->assertFalse($validator->isValid('č'));
        $this->assertFalse($validator->isValid('0'));
        $this->assertFalse($validator->isValid('lorem'));

        $validator = Validator::string()->maxLength(1);
        $this->assertTrue($validator->isValid(''));
        $this->assertTrue($validator->isValid(' '));
        $this->assertTrue($validator->isValid('č'));
        $this->assertTrue($validator->isValid('0'));
        $this->assertFalse($validator->isValid('lorem'));

        $validator = Validator::string()->maxLength(5);
        $this->assertTrue($validator->isValid(''));
        $this->assertTrue($validator->isValid(' '));
        $this->assertTrue($validator->isValid('č'));
        $this->assertTrue($validator->isValid('0'));
        $this->assertTrue($validator->isValid('lorem'));
        $this->assertFalse($validator->isValid('lorem ipsum'));
    }

    /**
     * Tests for Validator::string()->empty()
     * @throws \Exception
     */
    public function testEmpty() {
        $validator = Validator::string()->empty();

        //true
        $this->assertTrue($validator->isValid(''));

        //false
        $this->assertFalse($validator->isValid(' '));
        $this->assertFalse($validator->isValid('a'));
        $this->assertFalse($validator->isValid('0'));
        $this->assertFalse($validator->isValid('č'));
    }

    /**
     * Tests for Validator::string()->minLength()
     * @throws \Exception
     */
    public function testMinLength() {
        $wasException = FALSE;
        try {
            Validator::string()->minLength(-1);
        } catch (InvalidArgumentException $exception) {
            $wasException = TRUE;
        }
        $this->assertTrue($wasException);

        $validator = Validator::string()->minLength(0);
        $this->assertTrue($validator->isValid(''));
        $this->assertTrue($validator->isValid(' '));
        $this->assertTrue($validator->isValid('č'));
        $this->assertTrue($validator->isValid('0'));
        $this->assertTrue($validator->isValid('lorem'));

        $validator = Validator::string()->minLength(1);
        $this->assertFalse($validator->isValid(''));
        $this->assertTrue($validator->isValid(' '));
        $this->assertTrue($validator->isValid('č'));
        $this->assertTrue($validator->isValid('0'));
        $this->assertTrue($validator->isValid('lorem'));

        $validator = Validator::string()->minLength(5);
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid('0'));
        $this->assertFalse($validator->isValid(' '));
        $this->assertFalse($validator->isValid('č'));
        $this->assertTrue($validator->isValid('lorem'));
        $this->assertTrue($validator->isValid('lorem ipsum'));
    }
}
