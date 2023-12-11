<?php

namespace Mxgma\SwissBankPayment\Money;

/**
 * Sum of money in Canadian dollars
 */
class CAD extends Money
{
    /**
     * {@inheritdoc}
     */
    final public function getCurrency()
    {
        return 'CAD';
    }

    /**
     * {@inheritdoc}
     */
    final protected function getDecimals()
    {
        return 2;
    }
}
