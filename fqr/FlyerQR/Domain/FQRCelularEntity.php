<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Domain;

use FQr\Entity\Domain\CelularEntity;

class FQRCelularEntity extends CelularEntity{
    private $id;
    private $flyerKey;
    private $entityCode;
    private $entityStatus;

    public const ENTITY_CODE = "celular";
    public function __construct(string $digits, int $id = 0, string $flyerKey = '', string $entityStatus = '', string $entityCode = self::ENTITY_CODE, string $regEx = self::MOVIL_CHILE){
        parent::__construct($digits, $regEx);
        $this->setId($id);
        $this->setFlyerKey($flyerKey);
        $this->setEntityCode($entityCode);
        $this->setEntityStatus($entityStatus);
        $this->setDigits($digits);
    }

    public function getId()
    {
        return $this->id;    
    }

    private function setId($value):void{
        $this->id = $value;
    }

    public function getFlyerKey(){
        return $this->flyerKey;
    }

    private function setFlyerKey($value):void{
        $this->flyerKey = $value;
    }

    public function getEntityCode(){
        return $this->entityCode;
    }

    private function setEntityCode(string $value):void{
        $this->entityCode = $value;
    }

    public function getEntityStatus(){
        return $this->entityStatus;
    }

    private function setEntityStatus(string $value):void{
        $this->entityStatus = $value;
    }


    public function getDigits(){
        return $this->digits;
    }

    private function setDigits(string $value):void{
        $this->digits = $value;
    }
}