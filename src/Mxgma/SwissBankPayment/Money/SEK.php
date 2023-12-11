<?php

namespace Mxgma\SwissBankPayment\Money;

/**
 * Sum of money in Swedish kronor
 */
class SEK extends Money
{
    /**
     * {@inheritdoc}
     */
    final public function getCurrency()
    {
        return 'SEK';
    }

    /**
     * {@inheritdoc}
     */
    final protected function getDecimals()
    {
        return 2;
    }
}
