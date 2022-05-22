<?php
declare(strict_types=1);

namespace FQr\FlyerQR\Services;


use FQr\FlyerQR\Domain\Contracts\IFQRCRUDRepository;
use FQr\FlyerQR\Domain\FlyerQREntity;
use FQr\FlyerQR\Services\Contracts\IFQRFindForEMail;

final class FQRFindForEMail implements IFQRFindForEMail{


    private $repository;
    public function __construct(IFQRCRUDRepository $repository)
    {
        $this->repository = $repository;
    }


    public function execute(string $key) : FlyerQREntity{
        return $this->repository->findForEMail($key);        
    }
}