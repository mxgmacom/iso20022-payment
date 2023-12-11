<?php

namespace Mxgma\SwissBankPayment\Money;

/**
 * Sum of money in UAE dirhams
 */
class AED extends Money
{
    /**
     * {@inheritdoc}
     */
    final public function getCurrency()
    {
        return 'AED';
    }

    /**
     * {@inheritdoc}
     */
    final protected function getDecimals()
    {
        return 2;
    }
}
