<?php

namespace JozefGrencik\Validator\Rules;

use JozefGrencik\Validator\Exceptions\InvalidStringException;

class Net extends Rule
{

    /**
     * Validates value as IP(v4 or v6) address.
     * @return Net
     */
    public function ip(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!filter_var($value, FILTER_VALIDATE_IP)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Validates value as IP4 address.
     * @return Net
     */
    public function ip4(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Validates value as IP6 address.
     * @return Net
     */
    public function ip6(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Validates value as MAC address.
     * @return Net
     */
    public function mac(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!filter_var($value, FILTER_VALIDATE_MAC)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

}