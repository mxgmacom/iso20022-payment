# SwissBankPayment

> Beware! This is a library WIP.

**SwissBankPayment** is a PHP library to generate Swiss pain.001 XML messages (complies with ISO-20022).

## Installation

Just install [Composer](http://getcomposer.org) and run `composer require mxgma/swiss-bank-payment` in your project directory.

## Usage

To get a basic understanding on how the messages are structured, take a look [the resources](#further-resources) mentioned below. The following example shows how to create a message containing two transactions:

```php
<?php

require_once __DIR__.'/vendor/autoload.php';

use Mxgma\SwissBankPayment\BIC;
use Mxgma\SwissBankPayment\IBAN;
use Mxgma\SwissBankPayment\Message\CustomerCreditTransfer;
use Mxgma\SwissBankPayment\Money;
use Mxgma\SwissBankPayment\PaymentInformation\PaymentInformation;
use Mxgma\SwissBankPayment\PostalAccount;
use Mxgma\SwissBankPayment\StructuredPostalAddress;
use Mxgma\SwissBankPayment\TransactionInformation\BankCreditTransfer;
use Mxgma\SwissBankPayment\TransactionInformation\IS1CreditTransfer;
use Mxgma\SwissBankPayment\UnstructuredPostalAddress;

$transaction1 = new BankCreditTransfer(
    'instr-001',
    'e2e-001',
    new Money\CHF(130000), // CHF 1300.00
    'Muster Transport AG',
    new StructuredPostalAddress('Wiesenweg', '14b', '8058', 'Zürich-Flughafen'),
    new IBAN('CH51 0022 5225 9529 1301 C'),
    new BIC('UBSWCHZH80A')
);

$transaction2 = new IS1CreditTransfer(
    'instr-002',
    'e2e-002',
    new Money\CHF(30000), // CHF 300.00
    'Finanzverwaltung Stadt Musterhausen',
    UnstructuredPostalAddress::sanitize('Altstadt 1a', '4998 Musterhausen'),
    new PostalAccount('80-151-4')
);

$payment = new PaymentInformation(
    'payment-001',
    'InnoMuster AG',
    new BIC('ZKBKCHZZ80A'),
    new IBAN('CH6600700110000204481')
);
$payment->addTransaction($transaction1);
$payment->addTransaction($transaction2);

$message = new CustomerCreditTransfer('message-001', 'InnoMuster AG');
$message->addPayment($payment);

echo $message->asXml();
```

**Tip:** Take a look at `Mxgma\SwissBankPayment\Tests\Message\CustomerCreditTransferTest` to see all payment types in action.

## Caveats

- Not all business rules and recommendations are enforced, consult the documentation and **validate the resulting transaction file in cooperation with your bank**.
- At the moment cheque transfers are not supported (for details consult chapter 2.2 of the Implementation Guidelines)
- The whole project is still under development and therefore BC breaks can occur. Please contact me if you need a stable code base.

## Contributing

If you want to get your hands dirty, great! Here's a couple of steps/guidelines:

- Fork this repository
- Add your changes & tests for those changes (in `tests/`).
- Remember to stick to the existing code style as best as possible. When in doubt, follow `PSR-2`.
- Send me a pull request!

If you don't want to go through all this, but still found something wrong or missing, please
let me know, and/or **open a new issue report** so that I or others may take care of it.

## Further Resources

- [www.iso-payments.ch](http://www.iso-payments.ch) General website about the Swiss recommendations regarding ISO 20022
- [Swiss Business Rules for Customer-Bank Messages](http://www.six-interbank-clearing.com/dam/downloads/en/standardization/iso/swiss-recommendations/business-rules.pdf)
- [Swiss Implementation Guidelines for pain.001 and pain.002 Messages](http://www.six-interbank-clearing.com/dam/downloads/en/standardization/iso/swiss-recommendations/implementation-guidelines-ct.pdf)
- [SIX Validation Portal](https://validation.iso-payments.ch/)
- [PostFinance Validation Portal](https://isotest.postfinance.ch/corporates/)
