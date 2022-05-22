<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Services\Contracts;

use FQr\FlyerQR\Domain\FlyerQREntity;

interface IFQRFindForEMail{
    public function execute(string $email):FlyerQREntity;
}