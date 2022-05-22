<?php
declare(strict_types=1);

namespace FQr\Entity\Domain;

class AddressEntity{
    private $marketActivity;
    private $countryCode;
    private $city;
    private $street;
    private $informationAdditional;
    private $latitude;
    private $longitude;

    public function __construct( string $marketActivity, string $countryCode , string $city, string $street, string $informationAdditional = null, string $latitude = null, string $longitude = null){
        $this->marketActivity = $marketActivity;
        $this->countryCode = $countryCode;
        $this->city = $city;
        $this->street = $street;
        $this->informationAdditional = $informationAdditional;
        $this->latitude = $latitude;
        $this->longitude = $longitude;
    }
    public function getMarketActivity():?string{
        return $this->marketActivity;
    }
    public function getCountryCode(){
        return $this->countryCode;
    }
    public function getCity(){
        return $this->city;
    }
    public function getStreet(){
        return $this->street;
    }
    public function getInformationAdditional(){
        return $this->informationAdditional;
    }

    public function getLatitude(){
        return $this->latitude;
    }

    public function getLongitude(){
        return $this->longitude;
    }
}
