<?php
declare(strict_types=1);
namespace FQr\Entity\Domain\Contracts;

interface IEntityCRUDRepository{
    public function findForProperty(string $entity, string $property):array;
}