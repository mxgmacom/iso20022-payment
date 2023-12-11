<?php

namespace Mxgma\SwissBankPayment\TransactionInformation;

use DOMDocument;
use InvalidArgumentException;
use Mxgma\SwissBankPayment\BIC;
use Mxgma\SwissBankPayment\FinancialInstitutionInterface;
use Mxgma\SwissBankPayment\IBAN;
use Mxgma\SwissBankPayment\IID;
use Mxgma\SwissBankPayment\Money;
use Mxgma\SwissBankPayment\PaymentInformation\PaymentInformation;
use Mxgma\SwissBankPayment\AccountInterface;

/**
 * BankCreditTransfer contains all the information about a type 3 transaction.
 */
class BankCreditTransfer extends CreditTransfer
{
    /**
     * @var IBAN
     */
    protected $creditorIBAN;

    protected AccountInterface $creditorAccount;

    protected FinancialInstitutionInterface $creditorAgent;

    /**
     * {@inheritdoc}
     *
     * @param IBAN    $creditorIBAN  IBAN of the creditor
     * @param BIC|IID $creditorAgent BIC or IID of the creditor's financial institution
     *
     * @throws \InvalidArgumentException When the amount is not in EUR or CHF or when the creditor agent is not BIC or IID.
     */
    public function __construct($instructionId, $endToEndId, Money\Money $amount, $creditorName, $creditorAddress, AccountInterface $creditorAccount, FinancialInstitutionInterface $creditorAgent)
    {
        if (!$creditorAgent instanceof BIC && !$creditorAgent instanceof IID) {
            throw new InvalidArgumentException('The creditor agent must be an instance of BIC or IID.');
        }

        parent::__construct($instructionId, $endToEndId, $amount, $creditorName, $creditorAddress);

        $this->creditorAccount = $creditorAccount;
        $this->creditorAgent = $creditorAgent;
    }

    /**
     * {@inheritdoc}
     */
    public function asDom(DOMDocument $doc, PaymentInformation $paymentInformation)
    {
        $root = $this->buildHeader($doc, $paymentInformation);

        $creditorAgent = $doc->createElement('CdtrAgt');
        $creditorAgent->appendChild($this->creditorAgent->asDom($doc));
        $root->appendChild($creditorAgent);

        $root->appendChild($this->buildCreditor($doc));

        $creditorAccount = $doc->createElement('CdtrAcct');
        $creditorAccount->appendChild($this->creditorAccount->asDom($doc));
        $root->appendChild($creditorAccount);

        $this->appendPurpose($doc, $root);

        $this->appendRemittanceInformation($doc, $root);

        return $root;
    }
}
