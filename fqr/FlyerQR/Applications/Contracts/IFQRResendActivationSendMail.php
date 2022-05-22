<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Applications\Contracts;


interface IFQRResendActivationSendMail {
    public function execute(string $emailTemplate, string $email, string $marketName, string $urlTemporary ):void;
}