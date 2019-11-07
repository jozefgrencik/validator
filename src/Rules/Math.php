<?php

namespace JozefGrencik\Validator\Rules;

use JozefGrencik\Validator\Exceptions\InvalidStringException;

class Math extends Rule
{

    /**
     * Validates if value is prime number.
     * @return Math
     */
    public function prime(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (int $value) {
                if (!Math::isPrime($value)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Internal function for prime numbers.
     * @param int $value
     * @return bool
     */
    private static function isPrime(int $value): bool
    {
        if ($value < 2 || ($value > 2 && $value % 2 == 0)) {
            return false;
        }

        for ($i = 3; $i <= ceil(sqrt($value)); $i += 2) {
            if ($value % $i == 0) {
                return false;
            }
        }

        return true;
    }
}