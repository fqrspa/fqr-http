<?php
declare(strict_types=1);

namespace FQr\Entity\Domain;

use FQr\Entity\Domain\Exception\CelularException;

class CelularEntity{
    private $nationalPrefix;
    private $digits;
    private $regEx;
    public const MOVIL_CHILE =  '/^(\+?56)?(\s?)(0?9)(\s?)[9876543]\d{7}$/';

    public function __construct(string $digits, string $regEx= self::MOVIL_CHILE){

        $this->setRegEx($regEx);
        $this->setDigits($digits);
    }
    public function getRegEx(){
        return $this->regEx;
    }
    private function setRegEx(string $value):void{
        $this->regEx = $value;
    }
    public function getDigits(){
        return $this->digits;
    }
    private function setDigits(string $value):void{
        if(empty($value)){
            throw new CelularException('El número del celular no puede estar vacio');
        }
        if(!$this->is_valid($value, $this->getRegEx())){
            throw new CelularException('El número del celular no es valido');
        }
        $this->digits = $value;
    }

    private function is_valid(string $str, string $regex):bool
    {
        $matches = null;
        return (1 === preg_match($regex, $str, $matches));
    }

}