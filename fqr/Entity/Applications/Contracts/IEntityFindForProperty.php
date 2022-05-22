<?php
declare(strict_types=1);
namespace FQr\Entity\Applications\Contracts;

interface IEntityFindForProperty{

    public function execute(string $entity, string $property):array;

}