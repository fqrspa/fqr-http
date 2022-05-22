<?php
declare(strict_types=1);

namespace FQr\FlyerQR\Services;

use FQr\FlyerQR\Domain\Contracts\IFQRCRUDRepository;
use FQr\FlyerQR\Domain\FlyerQREntity;
use FQr\FlyerQR\Services\Contracts\IFQRUpdateStatusForFlyerKey;

final class FQRUpdateStatusForFlyerKey implements IFQRUpdateStatusForFlyerKey{

    private $repository;
    public function __construct(IFQRCRUDRepository $repository)
    {
        $this->repository = $repository;
    }


    public function execute(string $flyerKey, string $status):FlyerQREntity{
        return $this->repository->updateStatusForKey($flyerKey, $status);
    }
}