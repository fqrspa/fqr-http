<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Services\Contracts;

use FQr\FlyerQR\Domain\FQRInstagramURLEntity;

interface IFQRInstagramURLFindForFlyerKey{
    public function execute(string $flyerKey):FQRInstagramURLEntity;
}