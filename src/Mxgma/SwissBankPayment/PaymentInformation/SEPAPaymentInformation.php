<?php

namespace Mxgma\SwissBankPayment\PaymentInformation;

use Mxgma\SwissBankPayment\FinancialInstitutionInterface;
use Mxgma\SwissBankPayment\IBAN;

/**
 * SEPAPaymentInformation contains a group of SEPA transactions
 */
class SEPAPaymentInformation extends PaymentInformation
{
    /**
     * {@inheritdoc}
     */
    public function __construct($id, $debtorName, FinancialInstitutionInterface $debtorAgent, IBAN $debtorIBAN)
    {
        parent::__construct($id, $debtorName, $debtorAgent, $debtorIBAN);
        $this->serviceLevel = 'SEPA';
    }
}
