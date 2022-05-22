<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Services\Contracts;

use FQr\FlyerQR\Domain\FQRURLEntity;

interface IFQRURLFindForFlyerKey{
    public function execute(string $flyerKey):FQRURLEntity;
}