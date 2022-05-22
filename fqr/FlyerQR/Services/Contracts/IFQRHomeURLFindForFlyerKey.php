<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Services\Contracts;

use FQr\FlyerQR\Domain\FQRHomeURLEntity;


interface IFQRHomeURLFindForFlyerKey{
    public function execute(string $flyerKey):FQRHomeURLEntity;
}