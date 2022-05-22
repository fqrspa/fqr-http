<?php
declare(strict_types=1);

namespace FQr\Entity\Domain;

class BankAccountEntity{
    private $countryCode;
    private $bankCode;
    private $accountTypeCode;
    private $accountNumber;
    private $clientName;
    private $clientEMail;

    public function __construct(string $countryCode, string $bankCode, string $accountTypeCode, string $accountNumber, string $clientName, string $clientEMail){
        $this->countryCode = $countryCode;
        $this->bankCode = $bankCode;
        $this->accountTypeCode = $accountTypeCode;
        $this->accountNumber = $accountNumber;
        $this->clientName = $clientName;
        $this->clientEMail = $clientEMail;
    }
    public function getCountryCode(){
        return $this->countryCode;
    }
    public function getBankCode(){
        return $this->bankCode;
    }
    public function getAccountTypeCode(){
        return $this->accountTypeCode;
    }
    public function getAccountNumber(){
        return $this->accountNumber;
    }
    public function getClientName(){
        return $this->clientName;
    }
    public function getClientEMail(){
        return $this->clientEMail;
    }

}