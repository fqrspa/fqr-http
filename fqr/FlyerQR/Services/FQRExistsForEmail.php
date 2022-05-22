<?php
declare(strict_types=1);

namespace FQr\FlyerQR\Services;

use FQr\Entity\Domain\EMailEntity;
use FQr\FlyerQR\Domain\Contracts\IFQRCRUDRepository;
use FQr\FlyerQR\Services\Contracts\IFQRExistsForEmail;

final class FQRExistsForEmail implements IFQRExistsForEmail{
    private $repository;
    public function __construct(IFQRCRUDRepository $repository)
    {
        $this->repository = $repository;
    }

    public function execute(string $email):bool{
        
        return $this->repository->existEmail(new EMailEntity($email));
    }
}