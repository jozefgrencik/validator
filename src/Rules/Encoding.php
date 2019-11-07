<?php

namespace JozefGrencik\Validator\Rules;

use JozefGrencik\Validator\Exceptions\InvalidStringException;

class Encoding extends Rule
{

    /**
     * Check if String is encoded with Base64.
     * @return Encoding
     * @link https://tools.ietf.org/html/rfc3548
     * @todo regexp subject max size?
     * @todo length check first? (+ performance?)
     */
    public function base64(): self
    {
        /*
            Special processing is performed if fewer than 24 bits are available
            at the end of the data being encoded.  A full encoding quantum is
            always completed at the end of a quantity.  When fewer than 24 input
            bits are available in an input group, zero bits are added (on the
            right) to form an integral number of 6-bit groups.  Padding at the
            end of the data is performed using the '=' character.  Since all base
            64 input is an integral number of octets, only the following cases
            can arise:

            (1) the final quantum of encoding input is an integral multiple of 24
            bits; here, the final unit of encoded output will be an integral
            multiple of 4 characters with no "=" padding,

            (2) the final quantum of encoding input is exactly 8 bits; here, the
            final unit of encoded output will be two characters followed by two
            "=" padding characters, or

            (3) the final quantum of encoding input is exactly 16 bits; here, the
            final unit of encoded output will be three characters followed by one
            "=" padding character.
         */
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!preg_match('#^[a-zA-Z0-9/+]*={0,2}$#', $value)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Check if String is encoded with Base32.
     * @return Encoding
     * @link https://tools.ietf.org/html/rfc3548
     * @todo regexp subject max size?
     */
    public function base32(): self
    {
        /*
            Special processing is performed if fewer than 40 bits are available
            at the end of the data being encoded.  A full encoding quantum is
            always completed at the end of a body.  When fewer than 40 input bits
            are available in an input group, zero bits are added (on the right)
            to form an integral number of 5-bit groups.  Padding at the end of
            the data is performed using the "=" character.  Since all base 32
            input is an integral number of octets, only the following cases can
            arise:

            (1) the final quantum of encoding input is an integral multiple of 40
            bits; here, the final unit of encoded output will be an integral
            multiple of 8 characters with no "=" padding,

            (2) the final quantum of encoding input is exactly 8 bits; here, the
            final unit of encoded output will be two characters followed by six
            "=" padding characters,

            (3) the final quantum of encoding input is exactly 16 bits; here, the
            final unit of encoded output will be four characters followed by four
            "=" padding characters,

            (4) the final quantum of encoding input is exactly 24 bits; here, the
            final unit of encoded output will be five characters followed by
            three "=" padding characters, or

            (5) the final quantum of encoding input is exactly 32 bits; here, the
            final unit of encoded output will be seven characters followed by one
            "=" padding character.
         */
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!preg_match(
                    '#^(?:[A-Z2-7]{8})*(?:[A-Z2-7]{2}={6}|[A-Z2-7]{4}={4}|[A-Z2-7]{5}={3}|[A-Z2-7]{7}=)?$#',
                    $value
                )) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Check if String is encoded with Base16.
     * @return Encoding
     * @link https://tools.ietf.org/html/rfc3548
     * @todo regexp subject max size?
     */
    public function base16(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!preg_match('#^[0-9A-F]*$#', $value)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Check if String is encoded in hex format.
     * @return Encoding
     * @todo regexp subject max size?
     * @todo http://php.net/ctype_xdigit
     */
    public function hex(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!preg_match('#^[0-9A-Fa-f]*$#', $value)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Check if String is encoded in binary format.
     * @return Encoding
     * @todo regexp subject max size?
     */
    public function binary(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!preg_match('#^[01]*$#', $value)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

    /**
     * Check if String is encoded in decimal format.
     * @return Encoding
     * @todo regexp subject max size?
     * @todo http://php.net/manual/en/function.ctype-digit.php (performance?)
     */
    public function decimal(): self
    {
        $this->addTest(
            __FUNCTION__,
            func_get_args(),
            function (string $value) {
                if (!preg_match('#^[0-9]*$#', $value)) {
                    throw new InvalidStringException('todo');
                }
            }
        );

        return $this;
    }

}