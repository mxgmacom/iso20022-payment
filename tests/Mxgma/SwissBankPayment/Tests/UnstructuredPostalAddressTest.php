<?php

namespace Mxgma\SwissBankPayment\Tests;

use Mxgma\SwissBankPayment\UnstructuredPostalAddress;

/**
 * @coversDefaultClass \Mxgma\SwissBankPayment\UnstructuredPostalAddress
 */
class UnstructuredPostalAddressTest extends TestCase
{
    /**
     * @covers ::sanitize
     */
    public function testSanitize()
    {
        $this->assertInstanceOf('Mxgma\SwissBankPayment\UnstructuredPostalAddress', UnstructuredPostalAddress::sanitize(
            "Dorf—Strasse 3\n\n",
            "8000\tZürich"
        ));
    }
}
