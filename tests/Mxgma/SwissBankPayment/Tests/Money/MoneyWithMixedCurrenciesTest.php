<?php

namespace Mxgma\SwissBankPayment\Tests\Money;

use Mxgma\SwissBankPayment\Money;
use Mxgma\SwissBankPayment\Tests\TestCase;

class MoneyWithMixedCurrenciesTest extends TestCase
{
    /**
     * @covers \Mxgma\SwissBankPayment\Money\MoneyWithMixedCurrencies::plus
     */
    public function testPlus()
    {
        $sum = new Money\MoneyWithMixedCurrencies(0);
        $sum = $sum->plus(new Money\CHF(2456));
        $sum = $sum->plus(new Money\CHF(1000));
        $sum = $sum->plus(new Money\JPY(1200));

        $this->assertEquals('1234.56', $sum->format());
    }

    /**
     * @covers \Mxgma\SwissBankPayment\Money\MoneyWithMixedCurrencies::minus
     */
    public function testMinus()
    {
        $sum = new Money\MoneyWithMixedCurrencies(100);
        $sum = $sum->minus(new Money\CHF(5000));
        $sum = $sum->minus(new Money\CHF(99));
        $sum = $sum->minus(new Money\JPY(300));

        $this->assertEquals('-250.99', $sum->format());
    }
}
