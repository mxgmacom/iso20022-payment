<?php

namespace Mxgma\SwissBankPayment\Tests\TransactionInformation;

use InvalidArgumentException;
use Mxgma\SwissBankPayment\Money;
use Mxgma\SwissBankPayment\PostalAccount;
use Mxgma\SwissBankPayment\StructuredPostalAddress;
use Mxgma\SwissBankPayment\Tests\TestCase;
use Mxgma\SwissBankPayment\TransactionInformation\IS1CreditTransfer;

/**
 * @coversDefaultClass \Mxgma\SwissBankPayment\TransactionInformation\IS1CreditTransfer
 */
class IS1CreditTransferTest extends TestCase
{
    /**
     * @covers ::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidAmount()
    {
        $this->expectException(InvalidArgumentException::class);

        $transfer = new IS1CreditTransfer(
            'id000',
            'name',
            new Money\USD(100),
            'name',
            new StructuredPostalAddress('foo', '99', '9999', 'bar'),
            new PostalAccount('10-2424-4')
        );
    }
}
