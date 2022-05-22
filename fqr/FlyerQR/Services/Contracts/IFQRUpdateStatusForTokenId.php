<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Services\Contracts;

use FQr\FlyerQR\Domain\FlyerQREntity;

interface IFQRUpdateStatusForTokenId{
    public function execute(string $tokenId, string $status):FlyerQREntity;
}