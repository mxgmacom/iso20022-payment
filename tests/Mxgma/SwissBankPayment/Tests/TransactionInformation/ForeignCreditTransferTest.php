<?php

namespace Mxgma\SwissBankPayment\Tests\TransactionInformation;

use Mxgma\SwissBankPayment\IBAN;
use Mxgma\SwissBankPayment\Money;
use Mxgma\SwissBankPayment\StructuredPostalAddress;
use Mxgma\SwissBankPayment\Tests\TestCase;
use Mxgma\SwissBankPayment\TransactionInformation\ForeignCreditTransfer;

/**
 * @coversDefaultClass \Mxgma\SwissBankPayment\TransactionInformation\ForeignCreditTransfer
 */
class ForeignCreditTransferTest extends TestCase
{
    /**
     * @covers ::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidCreditorAgent()
    {
        $creditorAgent = $this->getMock('\Mxgma\SwissBankPayment\FinancialInstitutionInterface');

        $transfer = new ForeignCreditTransfer(
            'id000',
            'name',
            new Money\CHF(100),
            'name',
            new StructuredPostalAddress('foo', '99', '9999', 'bar'),
            new IBAN('CH31 8123 9000 0012 4568 9'),
            $creditorAgent
        );
    }
}
