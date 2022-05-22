<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Services\Contracts;

use FQr\FlyerQR\Domain\FlyerQREntity;

interface IFQRUpdateStatusForFlyerKey{
    public function execute(string $flyerKey, string $status):FlyerQREntity;
}