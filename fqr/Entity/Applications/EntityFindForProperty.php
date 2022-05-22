<?php
declare(strict_types=1);
namespace FQr\Entity\Applications;

use FQr\Entity\Applications\Contracts\IEntityFindForProperty;
use FQr\Entity\Domain\Contracts\IEntityCRUDRepository;

class EntityFindForProperty implements IEntityFindForProperty{
    private $repository;
    public function __construct(IEntityCRUDRepository $repository )
    {
        $this->repository = $repository;
    }

    public function execute(string $entity, string $property):array{
        return $this->repository->findForProperty($entity, $property);
    }

}