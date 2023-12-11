<?php

namespace Mxgma\SwissBankPayment\Tests;

use InvalidArgumentException;
use Mxgma\SwissBankPayment\GeneralAccount;

class GeneralAccountTest extends TestCase
{
    /**
     * @covers \Mxgma\SwissBankPayment\GeneralAccount::__construct
     */
    public function testValid()
    {
        $instance = new GeneralAccount('A-123-4567890-78');
    }

    /**
     * @covers \Mxgma\SwissBankPayment\GeneralAccount::__construct
     * @expectedException InvalidArgumentException
     */
    public function testInvalid()
    {
        $this->expectException(\InvalidArgumentException::class);

        $exceptionThrown = null;

        try {
            $instance = new GeneralAccount('0123456789012345678901234567890123456789');
        } catch (\Exception $exception) {
            $exceptionThrown = $exception;
        }

        $this->assertTrue($exceptionThrown instanceof InvalidArgumentException);
    }

    /**
     * @covers \Mxgma\SwissBankPayment\GeneralAccount::format
     */
    public function testFormat()
    {
        $instance = new GeneralAccount('  123-4567890-78 AA ');
        $this->assertSame('  123-4567890-78 AA ', $instance->format());
    }
}
