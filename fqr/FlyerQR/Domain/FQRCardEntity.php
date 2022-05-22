<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Domain;

final class FQRCardEntity
{
    private $email;
    private $tokenId;
    private $flyerKey;
    private $entityStatus;
    private $entityCreationDate;
    private $contractStatus;
    private $marketName;
    private $marketArea;

    public function __construct(string $email, string $tokenId = null, string $flyerKey, string $entityStatus, string $entityCreationDate, string $contractStatus, string $marketName, string $marketArea)
    {
        $this->email = $email;
        $this->tokenId = $tokenId;
        $this->flyerKey = $flyerKey;
        $this->entityStatus = $entityStatus;
        $this->entityCreationDate = $entityCreationDate;
        $this->contractStatus = $contractStatus;
        $this->marketName = $marketName;
        $this->marketArea = $marketArea;
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
}
