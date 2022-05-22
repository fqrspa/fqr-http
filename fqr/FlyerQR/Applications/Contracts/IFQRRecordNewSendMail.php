<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Applications\Contracts;


interface IFQRRecordNewSendMail {
    public function execute(string $email, string $marketName, string $urlTemporary ):void;
}