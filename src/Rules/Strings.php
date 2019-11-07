<?php

namespace JozefGrencik\Validator\Rules;

use JozefGrencik\Validator\Exceptions\InvalidArgumentException;
use JozefGrencik\Validator\Exceptions\InvalidStringException;

class Strings extends Rule
{

    /**
     * Check if string is empty.
     * @return Strings
     */
    public function empty(): self
    {
        $this
            ->length(0)
            ->alterLastName(__FUNCTION__, func_get_args());

        return $this;
    }

    /**
     * Check if String has exact length.
     * @param int $length
     * @return Strings
     */
    public function length(int $length): self
    {
        if ($length < 0) {
            throw new InvalidArgumentException('Argument must be bigger or equal than zero');
        }
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) use ($length) {
                if (mb_strlen($value) !== $length) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Check if String is not empty.
     * @return Strings
     */
    public function notEmpty(): self
    {
        $this
            ->minLength(1)
            ->alterLastName(__FUNCTION__, func_get_args());

        return $this;
    }

    /**
     * Check if String has length lower or equal than $maxLength.
     * @param int $maxLength
     * @return Strings
     */
    public function maxLength(int $maxLength): self
    {
        if ($maxLength < 0) {
            throw new InvalidArgumentException('Argument must be bigger or equal than zero');
        }
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) use ($maxLength) {
                if (mb_strlen($value) > $maxLength) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Check if String has length >= than $minLength and =< than $maxLength. &lt;$minLength, $maxLength&gt;.
     * @param int $minLength
     * @param int $maxLength
     * @return Strings
     */
    public function lengthBetween(int $minLength = null, int $maxLength = null): self
    {
        if ($minLength === null) {
            $minLength = 0;
        } elseif ($minLength < 0) {
            throw new InvalidArgumentException('First argument must be bigger or equal than zero');
        }

        if ($maxLength === null) {
            $maxLength = PHP_INT_MAX;
        } elseif ($maxLength < 0) {
            throw new InvalidArgumentException('Second argument must be bigger or equal than zero');
        }

        if ($minLength > $maxLength) {
            throw new InvalidArgumentException('Second argument must be bigger or equal than first argument');
        }

        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) use ($minLength, $maxLength) {
                $length = mb_strlen($value);
                if ($length < $minLength || $length > $maxLength) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Check if String has length bigger or equal than $minLength.
     * @param int $minLength
     * @return Strings
     */
    public function minLength(int $minLength): self
    {
        if ($minLength < 0) {
            throw new InvalidArgumentException('Argument must be bigger or equal than zero');
        }
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) use ($minLength) {
                if (mb_strlen($value) < $minLength) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }
}