<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Services\Contracts;

use FQr\FlyerQR\Domain\FQRWhatsAppEntity;

interface IFQRWhatsAppFindForFlyerKey{
    public function execute(string $flyerKey):FQRWhatsAppEntity;
}