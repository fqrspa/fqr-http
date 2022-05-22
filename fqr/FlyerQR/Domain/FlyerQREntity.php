<?php
declare(strict_types=1);

namespace FQr\FlyerQR\Domain;

final class FlyerQREntity
{
    private $email;
    private $tokenId;
    private $flyerKey;
    private $entityStatus;
    private $entityCreationDate;
    private $contractStatus;
    private $marketName;
    private $marketArea;
    private $links = array();
    private $telephones = array();
    private $addresses = array();
    private $bankAccounts = array();

    public function __construct(
        string $email,
        string $flyerKey,
        string $tokenId,
        string $marketName,
        string $marketArea,
        array $links = array(),
        array $telephones = array(),
        array $addresses = array(),
        array $bankAccounts = array(),
        string $entityStatus = null,
        string $entityCreationDate = null,
        string $contractStatus = null
)
    {
        $this->email = $email;
        $this->tokenId = $tokenId;
        $this->flyerKey = $flyerKey;
        $this->entityStatus = $entityStatus;
        $this->entityCreationDate = $entityCreationDate;
        $this->contractStatus = $contractStatus;
        $this->marketName = $marketName;
        $this->marketArea = $marketArea;
        $this->links =  $links;
        $this->telephones = $telephones;
        $this->addresses = $addresses;
        $this->bankAccounts = $bankAccounts;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
    public function getTokenId():string{
        return $this->tokenId;
    }
    public function getFlyerKey(): string
    {
        return $this->flyerKey;
    }
    public function getEntityStatus(){
        return $this->entityStatus;
    }
    public function getEntityCreationDate(){
        return $this->entityCreationDate;
    }
    
    public function getContractStatus(){
        return $this->contractStatus;
    }

    public function getMarketName(): string
    {
        return $this->marketName;
    }
    public function getMarketArea(): string
    {
        return $this->marketArea;
    }

    public function getLinks():array
    {
        return $this->links;
    }
    public function getTelephones():array
    {
        return $this->telephones;
    }
    public function getAddresses():array
    {
        return $this->addresses;
    }
    public function getBankAccounts():array
    {
        return $this->bankAccounts;
    }
}
