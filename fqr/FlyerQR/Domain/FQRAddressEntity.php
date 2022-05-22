<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Domain;

use FQr\Entity\Domain\AddressEntity;

class FQRAddressEntity extends AddressEntity{
    private $id;
    private $flyerKey;
    private $entityStatus;
    private $entityCode;

    public function __construct(string $entityCode,string $marketActivity = null, string $countryCode, string $city, string $street, string $informationAdditional, string $latitude = null, string $longitude  = null, int $id = 0, string $flyerKey = null, string $entityStatus = null){
        
        $this->id = $id;
        $this->flyerKey = $flyerKey;
        $this->entityCode = $entityCode;
        $this->entityStatus = $entityStatus;
        parent::__construct($marketActivity, $countryCode, $city, $street, $informationAdditional, $latitude, $longitude);
    }

    public function getId(){
        return $this->id;
    }
    public function getFlyerKey()
    {
        return $this->flyerKey;
    }
    public function getEntityCode()
    {
        return $this->entityCode;
    }
    public function getEntityStatus(){
        return $this->entityStatus;
    }

}