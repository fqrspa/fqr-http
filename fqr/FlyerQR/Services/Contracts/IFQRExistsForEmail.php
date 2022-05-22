<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Services\Contracts;


interface IFQRExistsForEmail{
    public function execute(string $email):bool;
}