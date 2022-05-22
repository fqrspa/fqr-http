<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Services\Contracts;

use FQr\Entity\Domain\AddressEntity;
use FQr\Entity\Domain\BankAccountEntity;
use FQr\FlyerQR\Domain\FlyerQREntity;

interface IFQRCreate{
    public function execute(
        string $email,
        string $marketArea = null,
        string $marketName = null,
        string $instagramURL = null,
        string $facebookURL = null,
        string $siteURL = null,
        string $whatsapp = null,
        AddressEntity $addressEntity = null,
        BankAccountEntity $bankAccountEntity = null

    ) : FlyerQREntity;
}