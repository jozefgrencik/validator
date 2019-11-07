<?php

namespace JozefGrencik\Validator;

use JozefGrencik\Validator\Rules\Encoding;
use JozefGrencik\Validator\Rules\Integer;
use JozefGrencik\Validator\Rules\Math;
use JozefGrencik\Validator\Rules\Net;
use JozefGrencik\Validator\Rules\Strings;

class Validator
{
    const VERSION = 0.1;
    const VERSION_ID = 100;

    /**
     * todo
     * @return Strings
     */
    public static function string(): Strings
    {
        return new Strings();
    }

    /**
     * todo
     * todo rename keyword?
     * @return Integer
     */
    public static function integer(): Integer
    {
        return new Integer();
    }

    /**
     * todo
     * @return Math
     */
    public static function math(): Math
    {
        return new Math();
    }

    /**
     * todo
     * @return Net
     */
    public static function net(): Net
    {
        return new Net();
    }

    /**
     * todo
     * @return Encoding
     */
    public static function encoding(): Encoding
    {
        return new Encoding();
    }

}