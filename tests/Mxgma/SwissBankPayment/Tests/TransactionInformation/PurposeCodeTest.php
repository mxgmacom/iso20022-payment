<?php

namespace Mxgma\SwissBankPayment\Tests\TransactionInformation;

use DOMDocument;
use Mxgma\SwissBankPayment\Tests\TestCase;
use Mxgma\SwissBankPayment\TransactionInformation\PurposeCode;

/**
 * @coversDefaultClass \Mxgma\SwissBankPayment\TransactionInformation\PurposeCode
 */
class PurposeCodeTest extends TestCase
{
    /**
     * @dataProvider validSamples
     * @covers ::__construct
     */
    public function testValid($code)
    {
        $this->assertInstanceOf('Mxgma\SwissBankPayment\TransactionInformation\PurposeCode', new PurposeCode($code));
    }

    public function validSamples()
    {
        return [
            ['SALA'], // salary payment
            ['PENS'], // pension payment
            ['DNTS'], // dental services
            ['B112'], // US mutual fund trailer fee (12b-1) payment
        ];
    }

    /**
     * @dataProvider invalidSamples
     * @covers ::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testInvalid($code)
    {
        $this->expectException(\InvalidArgumentException::class);

        new PurposeCode($code);
    }

    public function invalidSamples()
    {
        return [
            [''],
            ['sala'],
            ['SAL'],
            [' SALA'],
        ];
    }

    /**
     * @covers ::asDom
     */
    public function testAsDom()
    {
        $doc = new DOMDocument();
        $iid = new PurposeCode('PHON');

        $xml = $iid->asDom($doc);

        $this->assertSame('Cd', $xml->nodeName);
        $this->assertSame('PHON', $xml->textContent);
    }
}
