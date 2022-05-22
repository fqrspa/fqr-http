<?php
declare(strict_types=1);

namespace FQr\FlyerQR\Domain\Contracts;


use FQr\Entity\Domain\EMailEntity;
use FQr\FlyerQR\Domain\FlyerQREntity;
use FQr\FlyerQR\Domain\FQRAddressEntity;
use FQr\FlyerQR\Domain\FQRBankAccountEntity;
use FQr\FlyerQR\Domain\FQRFacebookURLEntity;
use FQr\FlyerQR\Domain\FQRInstagramURLEntity;
use FQr\FlyerQR\Domain\FQRURLEntity;
use FQr\FlyerQR\Domain\FQRWhatsAppEntity;

interface IFQRCRUDRepository{
    public function create(
        string $contratoKey,
        string $tokenId,
        string $email,
        string $marketArea = null,
        string $marketName = null,
        FQRInstagramURLEntity $fqrInstagramURL = null,
        FQRFacebookURLEntity $fqrFacebookURL = null,
        FQRURLEntity $fqrSiteURL = null,
        FQRWhatsAppEntity $fqrWhatsapp = null,
        FQRAddressEntity $fqrAddressEntity = null,
        FQRBankAccountEntity $fqrBankAccountEntity = null
    ) : FlyerQREntity;

    public function existEmail(EMailEntity $email):bool;
    public function findForEMail($email): FlyerQREntity;
    public function findForKey($key): FlyerQREntity;
    public function updateStatusForKey(string $flyerKey, string $status):FlyerQREntity;
    public function updateStatusForTokenId(string $tokenId, string $status):FlyerQREntity;
    public function generateToken(string $flyerKey, string $tokenId) : FlyerQREntity;

}