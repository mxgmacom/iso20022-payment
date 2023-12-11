<?php

namespace Mxgma\SwissBankPayment\Money;

/**
 * Sum of money in Hungarian forint
 */
class HUF extends Money
{
    /**
     * {@inheritdoc}
     */
    final public function getCurrency()
    {
        return 'HUF';
    }

    /**
     * {@inheritdoc}
     */
    final protected function getDecimals()
    {
        return 2;
    }
}
