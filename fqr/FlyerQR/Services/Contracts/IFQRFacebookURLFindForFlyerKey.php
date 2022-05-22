<?php
declare(strict_types=1);

namespace FQr\FlyerQR\Services\Contracts;

use FQr\FlyerQR\Domain\FQRFacebookURLEntity;

interface IFQRFacebookURLFindForFlyerKey{
    public function execute(string $flyerKey):FQRFacebookURLEntity;
}