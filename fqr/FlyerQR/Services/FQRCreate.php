<?php

declare(strict_types=1);
namespace FQr\FlyerQR\Services;

use FQr\Entity\Domain\AddressEntity;
use FQr\Entity\Domain\BankAccountEntity;

use FQr\FlyerQR\Domain\Contracts\IFQRCRUDRepository;
use FQr\FlyerQR\Domain\FlyerQREntity;
use FQr\FlyerQR\Domain\FQRAddressEntity;
use FQr\FlyerQR\Domain\FQRFacebookURLEntity;
use FQr\FlyerQR\Domain\FQRHomeURLEntity;
use FQr\FlyerQR\Domain\FQRInstagramURLEntity;
use FQr\FlyerQR\Domain\FQRWhatsAppEntity;
use FQr\FlyerQR\Services\Contracts\IFQRCreate;
use Illuminate\Support\Str;
use lib\Utils;

final class FQRCreate implements IFQRCreate
{
    private $fqrCUDRepository;

    public function __construct(
        IFQRCRUDRepository $fqrCUDRepository
    ) {
        $this->fqrCUDRepository = $fqrCUDRepository; 
    }

    public function execute(
        string $email,
        string $marketArea = null,
        string $marketName = null,
        string $instagramURL = null,
        string $facebookURL = null,
        string $homeURL = null,
        string $whatsapp = null,
        AddressEntity $addressEntity = null,
        BankAccountEntity $bankAccountEntity = null
    ): FlyerQREntity {
        
        $contratoId = Utils::generateContratoId();
         
         $tokenId = Utils::generateTokenId();
        
        return $this->fqrCUDRepository->create(
            $contratoId,
            $tokenId,
            $email,
            $marketArea,
            $marketName,
            empty($instagramURL) ? null : new FQRInstagramURLEntity($instagramURL),
            empty($facebookURL) ? null : new FQRFacebookURLEntity($facebookURL),
            empty($homeURL) ? null :  new FQRHomeURLEntity($homeURL),
            empty($whatsapp) ? null : new FQRWhatsAppEntity($whatsapp),
            empty($addressEntity) ? null : new FQRAddressEntity(
                'empresa',
                $addressEntity->getMarketActivity(),
                $addressEntity->getCountryCode(),
                $addressEntity->getCity(),
                $addressEntity->getStreet(),
                $addressEntity->getInformationAdditional(),
                $addressEntity->getLatitude(),
                $addressEntity->getLongitude()
            )
        );
    }


}
