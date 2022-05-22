<?php
declare(strict_types=1);

namespace FQr\FlyerQR\Domain\Contracts;

use FQr\FlyerQR\Domain\FQRInstagramURLEntity;

interface IInstragramCRUDRepository{
    public function create(FQRInstagramURLEntity $fqrInstagramURLEntity):bool;
    public function update(FQRInstagramURLEntity $fqrInstagramURLEntity): void;
    public function findForKey($flyerKey): FQRInstagramURLEntity;

}