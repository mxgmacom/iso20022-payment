<?php

namespace Mxgma\SwissBankPayment\Money;

/**
 * Sum of money in Swiss francs
 */
class CHF extends Money
{
    /**
     * {@inheritdoc}
     */
    final public function getCurrency()
    {
        return 'CHF';
    }

    /**
     * {@inheritdoc}
     */
    final protected function getDecimals()
    {
        return 2;
    }
}
