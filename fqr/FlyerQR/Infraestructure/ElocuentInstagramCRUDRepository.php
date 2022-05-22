<?php

declare(strict_types=1);

namespace FQr\FlyerQR\Infraestructure;


use FQr\FlyerQR\Domain\Contracts\IInstragramCRUDRepository;
use FQr\FlyerQR\Domain\FQRInstagramURLEntity;

class ElocuentInstagramCRUDRepository implements IInstragramCRUDRepository

{
    
    public function __construct()
    {
    }

    public function create(FQRInstagramURLEntity $email):bool{
        return false;
    }
    public function update(FQRInstagramURLEntity $fqrInstagramURLEntity): void{

    }
    public function findForKey($key): FQRInstagramURLEntity{
        return new FQRInstagramURLEntity("");
    }

}
