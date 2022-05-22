<?php
declare(strict_types=1);

namespace FQr\FlyerQR\Services;


use FQr\FlyerQR\Domain\Contracts\IFQRCRUDRepository;
use FQr\FlyerQR\Domain\FlyerQREntity;
use FQr\FlyerQR\Services\Contracts\IFQRGenerateTokenId;
use lib\Utils;

final class FQRGenerateTokenId implements IFQRGenerateTokenId{

    private $repository;
    public function __construct(IFQRCRUDRepository $repository)
    {
        $this->repository = $repository;
    }


    public function execute(string $email):FlyerQREntity{
        return $this->repository->generateToken($email, Utils::generateTokenId());
    }
}