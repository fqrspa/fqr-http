<?php
declare(strict_types=1);

namespace FQr\FlyerQR\Services;


use FQr\FlyerQR\Domain\Contracts\IFQRCRUDRepository;
use FQr\FlyerQR\Domain\FlyerQREntity;
use FQr\FlyerQR\Services\Contracts\IFQRUpdateStatusForTokenId;

final class FQRUpdateStatusForTokenId implements IFQRUpdateStatusForTokenId{

    private $repository;
    public function __construct(IFQRCRUDRepository $repository)
    {
        $this->repository = $repository;
    }


    public function execute(string $tokenId, string $status):FlyerQREntity{
        return $this->repository->updateStatusForTokenId($tokenId, $status);
    }
}