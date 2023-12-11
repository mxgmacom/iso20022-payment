<?php

namespace Mxgma\SwissBankPayment\Tests\TransactionInformation;

use Mxgma\SwissBankPayment\BIC;
use Mxgma\SwissBankPayment\IBAN;
use Mxgma\SwissBankPayment\BBAN;
use Mxgma\SwissBankPayment\Money;
use Mxgma\SwissBankPayment\StructuredPostalAddress;
use Mxgma\SwissBankPayment\Tests\TestCase;
use Mxgma\SwissBankPayment\TransactionInformation\BankCreditTransfer;

/**
 * @coversDefaultClass \Mxgma\SwissBankPayment\TransactionInformation\BankCreditTransfer
 */
class BankCreditTransferTest extends TestCase
{
    /**
     * @covers ::__construct
     * @expectedException \InvalidArgumentException
     */
    public function testInvalidCreditorAgent()
    {
        $this->expectException(\InvalidArgumentException::class);

        $creditorAgent = $this->createMock('\Mxgma\SwissBankPayment\FinancialInstitutionInterface');

        $transfer = new BankCreditTransfer(
            'id000',
            'name',
            new Money\CHF(100),
            'name',
            new StructuredPostalAddress('foo', '99', '9999', 'bar'),
            new IBAN('CH31 8123 9000 0012 4568 9'),
            $creditorAgent
        );
    }

    /**
     * @covers ::__construct
     * @expectedException \TypeError
     */
    public function testInvalidAmount()
    {
        $this->expectException(\TypeError::class);

        $transfer = new BankCreditTransfer(
            'id000',
            'name',
            new Money\CHF(cents: 100),
            'name',
            new StructuredPostalAddress('foo', '99', '9999', 'bar'),
            new IBAN('CH31 8123 9000 0012 4568 9'),
            new BIC('PSETPD2SZZZ')
        );
    }
}
