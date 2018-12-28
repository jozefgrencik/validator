<?php
declare(strict_types=1);

namespace Test\Rules;

use JozefGrencik\Validator\Validator;
use PHPUnit\Framework\TestCase;

final class StringsTest extends TestCase {

    function testEmpty() {
        $trueValues = [
            ''
        ];

        $falseValues = [
            ' ',
            'a',
            '0'
        ];

        $validator = Validator::string()->empty(); 
        foreach ($trueValues as $value) {
            $this->assertTrue($validator->isValid($value));
        }
        foreach ($falseValues as $value) {
            $this->assertFalse($validator->isValid($value));
        }
    }

}