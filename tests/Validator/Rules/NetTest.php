<?php
declare(strict_types=1);

namespace Tests\Validator\Rules;

use JozefGrencik\Validator\Validator;
use PHPUnit\Framework\TestCase;

class NetTest extends TestCase {

    /**
     * Tests for Validator::net()->mac()
     * @throws \Exception
     */
    public function testMac() {
        $validator = Validator::net()->mac();

        //EUI-64
        $this->assertTrue($validator->isValid('0021.86b5.6e10'));

        //IEEE 802 format
        $this->assertTrue($validator->isValid('A0:0C:F1:56:98:AE'));

        // IEEE 802 format
        $this->assertTrue($validator->isValid('A0-0C-F1-56-98-AE'));
        $this->assertTrue($validator->isValid('a0-0c-f1-56-98-ae'));
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid('X0-0C-F1-56-98-AE')); //X
        $this->assertFalse($validator->isValid('A0-0C-F1-56-98-AE-AF')); //long
        $this->assertFalse($validator->isValid('A0-0C-F1-56-98')); //short
//        $this->assertFalse($validator->isValid(NULL));  //todo
        $this->assertFalse($validator->isValid(0));
    }

    /**
     * Tests for Validator::net()->ip()
     * @throws \Exception
     */
    public function testIp() {
        $validator = Validator::net()->ip();

        //IP4
        $this->assertTrue($validator->isValid('127.0.0.1'));
        $this->assertTrue($validator->isValid('192.168.0.255'));
        $this->assertFalse($validator->isValid('192.168.0.256')); //max 255
        $this->assertFalse($validator->isValid('192.168.0')); //too short
        $this->assertFalse($validator->isValid('192')); //too short
        $this->assertFalse($validator->isValid('192-168-0-255')); //wrong separator
        $this->assertTrue($validator->isValid('1.1.1.1'));
        $this->assertTrue($validator->isValid('0.0.0.0'));

        //IP6
        $this->assertTrue($validator->isValid('FE80:0000:0000:0000:0202:B3FF:FE1E:8329'));
        $this->assertFalse($validator->isValid('FE80:0000:0000:0000:0202:B3FF:FE1H:8329')); //H
        $this->assertTrue($validator->isValid('FE80::0202:B3FF:FE1E:8329')); //collapsed form
        $this->assertTrue($validator->isValid('2001:db8:8:4::2'));
        $this->assertTrue($validator->isValid('fdf8:f53b:82e4::53'));
        $this->assertTrue($validator->isValid('ff01:0:0:0:0:0:0:2'));

        //misc
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid(TRUE));
        $this->assertFalse($validator->isValid(-1));
        $this->assertFalse($validator->isValid(INF));
    }

    /**
     * Tests for Validator::net()->ip4()
     * @throws \Exception
     */
    public function testIp4() {
        $validator = Validator::net()->ip4();

        $this->assertTrue($validator->isValid('127.0.0.1'));
        $this->assertTrue($validator->isValid('192.168.0.255'));
        $this->assertFalse($validator->isValid('192.168.0.256')); //max 255
        $this->assertFalse($validator->isValid('192.168.0')); //too short
        $this->assertFalse($validator->isValid('192')); //too short
        $this->assertFalse($validator->isValid('192-168-0-255')); //wrong separator
        $this->assertTrue($validator->isValid('1.1.1.1'));
        $this->assertTrue($validator->isValid('0.0.0.0'));

        //misc
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid(TRUE));
        $this->assertFalse($validator->isValid(-1));
        $this->assertFalse($validator->isValid(INF));
    }

    /**
     * Tests for Validator::net()->ip6()
     * @throws \Exception
     */
    public function testIp6() {
        $validator = Validator::net()->ip6();

        $this->assertTrue($validator->isValid('FE80:0000:0000:0000:0202:B3FF:FE1E:8329'));
        $this->assertFalse($validator->isValid('FE80:0000:0000:0000:0202:B3FF:FE1H:8329')); //H
        $this->assertTrue($validator->isValid('FE80::0202:B3FF:FE1E:8329')); //collapsed form
        $this->assertTrue($validator->isValid('2001:db8:8:4::2'));
        $this->assertTrue($validator->isValid('fdf8:f53b:82e4::53'));
        $this->assertTrue($validator->isValid('ff01:0:0:0:0:0:0:2'));

        //misc
        $this->assertFalse($validator->isValid(''));
        $this->assertFalse($validator->isValid(TRUE));
        $this->assertFalse($validator->isValid(-1));
        $this->assertFalse($validator->isValid(INF));
    }
}
