<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Applications;

use App\Mail\register\FQRRecordNewSendEMailParameter;
use FQr\FlyerQR\Applications\Contracts\IFQRRecordNewSendMail;
use Illuminate\Support\Facades\Mail;

final class FQRRecordNewSendEMail implements IFQRRecordNewSendMail{
    
    public function __construct()
    {
    }

    public function execute(string $email, string $marketName, string $urlTemporary):void{
        $parameters = new \stdClass();
        $parameters->marketName = $marketName;
        $parameters->urlTemporary = $urlTemporary;
        Mail::to($email)->send(new FQRRecordNewSendEMailParameter($parameters));
        
    }
}