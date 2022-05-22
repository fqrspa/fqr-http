<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Applications\Contracts;

use FQr\FlyerQR\Domain\FlyerQREntity;

interface IFQRResendActivation{
    public function execute(
        string $resendActivationRouterName,
        string $emailTemplate,
        string $email
    ) : FlyerQREntity;
}