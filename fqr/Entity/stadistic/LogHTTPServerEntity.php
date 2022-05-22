<?php
final class LogHTTPServerEntity{
    private $id;
    private $flyerKey;
    private $entityCreationDate;
    private $entityCreationHours;
    private $actionRequest;
    private $phpSelf;
    private $httpReferer;
    private $remoteAddr;
    private $httpClientIp;
    private $httpUserAgent;
    private $httpUserAgentName;

    public function __construct(int $id, string $flyerKey, string $entityCreationDate, string $entityCreationHours,$actionRequest, string $phpSelf,string $httpReferer, string $remoteAddr, string $httpClientIp, string $httpUserAgent, string $httpUserAgentName){
        $this->id = $id;
        $this->flyerKey = $flyerKey;
        $this->entityCreationDate = $entityCreationDate;
        $this->entityCreationHours = $entityCreationHours;
        $this->actionRequest = $actionRequest;
        $this->phpSelf = $phpSelf;
        $this->httpReferer = $httpReferer;
        $this->remoteAddr = $remoteAddr;
        $this->httpClientIp = $httpClientIp;
        $this->httpUserAgent = $httpUserAgent;
        $this->httpUserAgentName = $httpUserAgentName;

    }
    public function getId(){
        return $this->id;
    }
    public function getFlyerKey(): string
    {
        return $this->flyerKey;
    }
    public function getEntityStatus(){
        return $this->entityStatus;
    }
    public function getEntityCreationDate(){
        return $this->entityCreationDate;;
    }
    public function getActionRequest(){
        $this->actionRequest;
    }
    public function getEntityCreationHours(){
        return $this->entityCreationHours;
    }
    public function getContractStatus(){
        return $this->contractStatus;
    }

    function getPHPSelf(){
        return $this->phpSelf;
    }
    function getHTTPReferer(){
        return $this->httpReferer;
    }
    function getRemoteAddr(){
        return $this->remoteAddr;
    }
    function getHTTPClientIp(){
        return $this->httpClientIp;
    }
    function getHTTPUserAgent(){
        return $this->httpUserAgent;
    }
    function getHTTPUserAgentName(){
        return $this->httpUserAgentName;
    }
}