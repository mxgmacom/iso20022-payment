<?php

namespace Mxgma\SwissBankPayment\Money;

/**
 * Sum of money in Polish złoty
 */
class PLN extends Money
{
    /**
     * {@inheritdoc}
     */
    final public function getCurrency()
    {
        return 'PLN';
    }

    /**
     * {@inheritdoc}
     */
    final protected function getDecimals()
    {
        return 2;
    }
}
