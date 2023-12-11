<?php

namespace Mxgma\SwissBankPayment\Tests\TransactionInformation;

use Mxgma\SwissBankPayment\ISRParticipant;
use Mxgma\SwissBankPayment\Money;
use Mxgma\SwissBankPayment\StructuredPostalAddress;
use Mxgma\SwissBankPayment\Tests\TestCase;
use Mxgma\SwissBankPayment\TransactionInformation\ISRCreditTransfer;

/**
 * @coversDefaultClass \Mxgma\SwissBankPayment\TransactionInformation\ISRCreditTransfer
 */
class ISRCreditTransferTest extends TestCase
{
    /**
     * @covers ::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidAmount()
    {
        $this->expectException(\InvalidArgumentException::class);

        $transfer = new ISRCreditTransfer(
            'id000',
            'name',
            new Money\USD(100),
            new ISRParticipant('10-2424-4'),
            '120000000000234478943216899'
        );
    }

    /**
     * @covers ::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidCreditorReference()
    {
        $this->expectException(\InvalidArgumentException::class);

        $transfer = new ISRCreditTransfer(
            'id000',
            'name',
            new Money\CHF(100),
            new ISRParticipant('01-25083-7'),
            '120000000000234478943216891'
        );
    }

    /**
     * @covers ::setRemittanceInformation
     * @expectedException \LogicException
     */
    public function testSetRemittanceInformation()
    {
        $this->expectException(\LogicException::class);

        $transfer = new ISRCreditTransfer(
            'id000',
            'name',
            new Money\CHF(100),
            new ISRParticipant('01-25083-7'),
            '120000000000234478943216899'
        );

        $transfer->setRemittanceInformation('not allowed');
    }

    /**
     * @covers ::setCreditorDetails
     */
    /*
    public function testCreditorDetails()
    {
        $transfer = new ISRCreditTransfer(
            'id000',
            'name',
            new Money\CHF(100),
            new ISRParticipant('01-25083-7'),
            '120000000000234478943216899'
        );

        $creditorName = 'name';
        $creditorAddress = new StructuredPostalAddress('foo', '99', '9999', 'bar');
        $transfer->setCreditorDetails($creditorName, $creditorAddress);
    }
    // */
}
