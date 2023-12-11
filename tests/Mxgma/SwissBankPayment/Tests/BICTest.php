<?php

namespace Mxgma\SwissBankPayment\Tests;

use Mxgma\SwissBankPayment\BIC;

class BICTest extends TestCase
{
    /**
     * @dataProvider validSamples
     * @covers \Mxgma\SwissBankPayment\BIC::__construct
     */
    public function testValid($bic)
    {
        $this->check($bic, true);
    }

    /**
     * @covers \Mxgma\SwissBankPayment\BIC::__construct
     */
    public function testInvalidLength()
    {
        $this->check('AABAFI22F', false);
        $this->check('HANDFIHH00', false);
    }

    /**
     * @covers \Mxgma\SwissBankPayment\BIC::__construct
     */
    public function testInvalidChars()
    {
        $this->check('HAND-FIHH', false);
        $this->check('HAND FIHH', false);
    }

    /**
     * @dataProvider validSamples
     * @covers \Mxgma\SwissBankPayment\BIC::format
     */
    public function testFormat($bic)
    {
        $instance = new BIC($bic);
        $this->assertEquals($bic, $instance->format());
    }

    public function validSamples()
    {
        return [
            ['AABAFI22'],
            ['HANDFIHH'],
            ['DEUTDEFF500'],
        ];
    }

    protected function check($iban, $valid)
    {
        $exception = false;
        try {
            $temp = new BIC($iban);
        } catch (\InvalidArgumentException $e) {
            $exception = true;
        }
        $this->assertTrue($exception != $valid);
    }
}
