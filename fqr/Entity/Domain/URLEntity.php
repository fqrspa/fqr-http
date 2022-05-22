<?php
declare(strict_types=1);

namespace FQr\Entity\Domain;

use FQr\Entity\Domain\Exception\URLException;

class URLEntity{
    private $url;
    private $regex;
    
    public const REGEX_URL =
    "/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/";   
    public function __construct(string $url, string $regex = self::REGEX_URL){
        $this->setRegEx($regex);
        $this->setURL($url);
    }

    public function getURL(){
        return $this->url;
    }
    private function setURL(string $url){

        if(empty($url)){
            throw new URLException('La URL debe contener un valor');
        }
        $this->validate($url, $this->regex);
        
        $this->url = $url;

    }
    private function setRegEx(string $regex){
        $this->regex = $regex;
    }
    private function validate(string $value, string $regex):void
    {
        $matches = null;
        if (1 != preg_match($regex, $value, $matches)) {
            throw new URLException('La URL ['.$value.'] ingresada no es valida');
        }
    }

}