<?php

namespace Mxgma\SwissBankPayment\Money;

/**
 * Sum of money in Kuwaiti dinars
 */
class KWD extends Money
{
    /**
     * {@inheritdoc}
     */
    final public function getCurrency()
    {
        return 'KWD';
    }

    /**
     * {@inheritdoc}
     */
    final protected function getDecimals()
    {
        return 3;
    }
}
