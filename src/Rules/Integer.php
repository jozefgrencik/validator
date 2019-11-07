<?php

namespace JozefGrencik\Validator\Rules;

use JozefGrencik\Validator\Exceptions\InvalidIntegerException;

class Integer extends Rule
{

    /**
     * Check if integer is positive. (>=1)
     * @return Integer
     */
    public function positive(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (int $value) {
                if ($value < 1) {
                    throw new InvalidIntegerException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Check if integer is negative. (<=-1)
     * @return Integer
     */
    public function negative(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if ($value > -1) {
                    throw new InvalidIntegerException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Shortcut for equal()
     * @param int $thanValue
     * @return Integer
     */
    public function eq(int $thanValue): self
    {
        $this
            ->equal($thanValue)
            ->alterLastName(__FUNCTION__, func_get_args());

        return $this;
    }

    /**
     * Check if integers are equal.
     * @param int $thanValue
     * @return Integer
     */
    public function equal(int $thanValue): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (int $value) use ($thanValue) {
                if ($value !== $thanValue) {
                    throw new InvalidIntegerException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Shortcut for notEqual().
     * @param int $thanValue
     * @return Integer
     */
    public function ne(int $thanValue): self
    {
        $this
            ->notEqual($thanValue)
            ->alterLastName(__FUNCTION__, func_get_args());

        return $this;
    }

    /**
     * Check if integers are not equal.
     * @param int $thanValue
     * @return Integer
     */
    public function notEqual(int $thanValue): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (int $value) use ($thanValue) {
                if ($value === $thanValue) {
                    throw new InvalidIntegerException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Shortcut for less().
     * @param int $thanValue
     * @return Integer
     */
    public function lt(int $thanValue): self
    {
        $this
            ->less($thanValue)
            ->alterLastName(__FUNCTION__, func_get_args());

        return $this;
    }

    /**
     * Check if integers is less than input value.
     * @param int $thanValue
     * @return Integer
     */
    public function less(int $thanValue): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (int $value) use ($thanValue) {
                if ($value >= $thanValue) {
                    throw new InvalidIntegerException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Shortcut for lessOrEqual().
     * @param int $thanValue
     * @return Integer
     */
    public function le(int $thanValue): self
    {
        $this
            ->lessOrEqual($thanValue)
            ->alterLastName(__FUNCTION__, func_get_args());

        return $this;
    }

    /**
     * Check if integers is less or equal than input value.
     * @param int $thanValue
     * @return Integer
     */
    public function lessOrEqual(int $thanValue): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (int $value) use ($thanValue) {
                if ($value > $thanValue) {
                    throw new InvalidIntegerException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Shortcut for greater().
     * @param int $thanValue
     * @return Integer
     */
    public function gt(int $thanValue): self
    {
        $this
            ->greater($thanValue)
            ->alterLastName(__FUNCTION__, func_get_args());

        return $this;
    }

    /**
     * Check if integers is less than input value.
     * @param int $thanValue
     * @return Integer
     */
    public function greater(int $thanValue): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (int $value) use ($thanValue) {
                if ($value <= $thanValue) {
                    throw new InvalidIntegerException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Shortcut for greaterOrEqual().
     * @param int $thanValue
     * @return Integer
     */
    public function ge(int $thanValue): self
    {
        $this
            ->greaterOrEqual($thanValue)
            ->alterLastName(__FUNCTION__, func_get_args());

        return $this;
    }

    /**
     * Check if integers is less than input value.
     * @param int $thanValue
     * @return Integer
     */
    public function greaterOrEqual(int $thanValue): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (int $value) use ($thanValue) {
                if ($value < $thanValue) {
                    throw new InvalidIntegerException('todo');
                }
            }
        );

        return $this;
    }
}