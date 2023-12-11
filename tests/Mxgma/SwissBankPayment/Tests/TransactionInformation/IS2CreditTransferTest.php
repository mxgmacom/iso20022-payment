<?php

namespace Mxgma\SwissBankPayment\Tests\TransactionInformation;

use Mxgma\SwissBankPayment\IBAN;
use Mxgma\SwissBankPayment\Money;
use Mxgma\SwissBankPayment\PostalAccount;
use Mxgma\SwissBankPayment\StructuredPostalAddress;
use Mxgma\SwissBankPayment\Tests\TestCase;
use Mxgma\SwissBankPayment\TransactionInformation\IS2CreditTransfer;

/**
 * @coversDefaultClass \Mxgma\SwissBankPayment\TransactionInformation\IS2CreditTransfer
 */
class IS2CreditTransferTest extends TestCase
{
    /**
     * @covers ::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidAmount()
    {
        $this->expectException(\InvalidArgumentException::class);

        $transfer = new IS2CreditTransfer(
            'id000',
            'name',
            new Money\USD(100),
            'creditor name',
            new StructuredPostalAddress('foo', '99', '9999', 'bar'),
            new Iban('AZ21 NABZ 0000 0000 1370 1000 1944'),
            'name',
            new PostalAccount('10-2424-4')
        );
    }
}
