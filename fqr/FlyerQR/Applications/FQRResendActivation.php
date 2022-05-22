<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Applications;

use FQr\FlyerQR\Applications\Contracts\IFQRResendActivation;
use FQr\FlyerQR\Applications\Contracts\IFQRResendActivationSendMail;
use FQr\FlyerQR\Domain\FlyerQREntity;
use FQr\FlyerQR\Services\Contracts\IFQRFindForEMail;
use FQr\FlyerQR\Services\Contracts\IFQRGenerateTokenId;

use Illuminate\Support\Facades\URL;

final class FQRResendActivation implements IFQRResendActivation
{
    //Agregar dependencias
    private $fqrGenerateTokenId;
    private $resendActivationSendEMail;
    

    public function __construct(
        IFQRResendActivationSendMail $resendActivationSendEMail,
        IFQRFindForEMail $fqrFindForEMail,
        IFQRGenerateTokenId $fqrGenerateTokenId
    ) {
        $this->fqrGenerateTokenId = $fqrGenerateTokenId;
        $this->fqrFindForEMail = $fqrFindForEMail;
        $this->resendActivationSendEMail = $resendActivationSendEMail;
    }

    public function execute(
        string $resendActivationRouterName,
        string $emailTemplate,
        string $email
    ): FlyerQREntity {


        
        $flyerQREntity = $this->fqrGenerateTokenId->execute($email);
        
        if(!empty($flyerQREntity)){
            $urlTemporary = URL::temporarySignedRoute($resendActivationRouterName, now()->addHour(24), ['tokenId' => $flyerQREntity->getTokenId()]);
            $this->resendActivationSendEMail->execute($emailTemplate, $email, $flyerQREntity->getMarketName(), $urlTemporary);
        }
        
        return $flyerQREntity;
    }

    
}
