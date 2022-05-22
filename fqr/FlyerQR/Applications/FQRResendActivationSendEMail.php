<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Applications;


use App\Mail\register\FQRResendActivationSendEMailParameter;
use FQr\FlyerQR\Applications\Contracts\IFQRResendActivationSendMail;
use Illuminate\Support\Facades\Mail;

final class FQRResendActivationSendEMail implements IFQRResendActivationSendMail{
    
    public function __construct()
    {
    }

    public function execute(string $emailTemplate, string $email, string $marketName, string $urlTemporary):void{
        $parameters = new \stdClass();
        $parameters->marketName = $marketName;
        $parameters->urlTemporary = $urlTemporary;
        $parameters->emailTemplate = $emailTemplate;
        Mail::to($email)->send(new FQRResendActivationSendEMailParameter($parameters));
        
    }
}