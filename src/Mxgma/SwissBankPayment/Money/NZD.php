<?php

namespace Mxgma\SwissBankPayment\Money;

/**
 * Sum of money in New Zealand dollars
 */
class NZD extends Money
{
    /**
     * {@inheritdoc}
     */
    final public function getCurrency()
    {
        return 'NZD';
    }

    /**
     * {@inheritdoc}
     */
    final protected function getDecimals()
    {
        return 2;
    }
}
