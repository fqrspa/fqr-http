<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Domain;

use FQr\Entity\Domain\BankAccountEntity;

final class FQRBankAccountEntity extends BankAccountEntity{
    private $id;
    private $entityCode;
    private $entityStatus;
    private $flyerKey;

    public function __construct(string $countryCode, string $bankCode, string $accountTypeCode, string $accountNumber, string $clientName, string $clientEMail, int $id,  string $flyerKey, string $entityCode, string $entityStatus){
        $this->id = $id;
        $this->flyerKey = $flyerKey;
        $this->entityCode = $entityCode;
        $this->entityStatus = $entityStatus;

        parent::__construct($countryCode, $bankCode, $accountTypeCode, $accountNumber, $clientName, $clientEMail);
    }
    public function getId(){
        return $this->id;
    }

    public function getFlyerKey(){
        return $this->flyerKey;
    }

    public function getEntityCode(){
        return $this->entityCode;
    }

    public function getEntityStatus(){
        return $this->entityStatus;
    }
}