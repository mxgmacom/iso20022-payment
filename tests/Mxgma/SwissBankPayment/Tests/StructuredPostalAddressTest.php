<?php

namespace Mxgma\SwissBankPayment\Tests;

use Mxgma\SwissBankPayment\StructuredPostalAddress;

/**
 * @coversDefaultClass \Mxgma\SwissBankPayment\StructuredPostalAddress
 */
class StructuredPostalAddressTest extends TestCase
{
    /**
     * @covers ::sanitize
     */
    public function testSanitize()
    {
        $this->assertInstanceOf('Mxgma\SwissBankPayment\StructuredPostalAddress', StructuredPostalAddress::sanitize(
            'Dorfstrasse',
            '∅',
            'Pfaffenschlag bei Waidhofen an der Thaya',
            '3834',
            'AT'
        ));
    }
}
