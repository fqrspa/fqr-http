<?php

declare(strict_types=1);
namespace FQr\FlyerQR\Applications;

use FQr\Entity\Domain\AddressEntity;
use FQr\Entity\Domain\BankAccountEntity;

use FQr\FlyerQR\Applications\Contracts\IFQRRecordNew;
use FQr\FlyerQR\Applications\Contracts\IFQRRecordNewSendMail;

use FQr\FlyerQR\Domain\FlyerQREntity;
use FQr\FlyerQR\Domain\FQRAddressEntity;
use FQr\FlyerQR\Domain\FQRFacebookURLEntity;
use FQr\FlyerQR\Domain\FQRHomeURLEntity;
use FQr\FlyerQR\Domain\FQRInstagramURLEntity;
use FQr\FlyerQR\Domain\FQRWhatsAppEntity;
use FQr\FlyerQR\Services\Contracts\IFQRCreate;
use FQr\FlyerQR\Services\Contracts\IFQRExistsForEmail;

use FQr\FlyerQR\Services\Exception\FQRCreateException;
use Illuminate\Support\Facades\URL;



final class FQRRecordNew implements IFQRRecordNew
{
    //Agregar dependencias
    private $fqrExistForEmail;
    private $fqrCreate;
    private $fqrRecordNewSendMail;

    public function __construct(
        IFQRRecordNewSendMail $fqrRecordNewSendMail,
        IFQRExistsForEmail $fqrExistForEmail,
        IFQRCreate $fqrCreate
    ) {
        $this->fqrCreate = $fqrCreate;
        $this->fqrExistForEmail = $fqrExistForEmail;
        $this->fqrRecordNewSendMail = $fqrRecordNewSendMail;
    }

    public function execute(
        string $emailTemplate,
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


        if ($this->fqrExistForEmail->execute($email)) {
            throw new FQRCreateException('El EMail está registrado');
        }

        
        $flyerQREntity = $this->fqrCreate->execute(
            $email,
            $marketArea,
            $marketName,
            $instagramURL,
            $facebookURL,
            $homeURL,
            $whatsapp,
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

        if(!empty($flyerQREntity)){
            $urlTemporary = URL::temporarySignedRoute($emailTemplate, now()->addHour(24), ['tokenId' => $flyerQREntity->getTokenId()]);
            $this->fqrRecordNewSendMail->execute($email, $flyerQREntity->getMarketName(), $urlTemporary);
        }

        return $flyerQREntity;
    }

    
}
