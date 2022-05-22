<?php

declare(strict_types=1);

namespace FQr\FlyerQR\Domain;

use FQr\Entity\Domain\URLEntity;


class FQRURLEntity extends URLEntity
{
    private $id;
    private $flyerKey;
    private $entityCode;
    private $entityStatus;

    public const ENTITY_CODE = "url";

    public function __construct(string $url, int $id = 0, string $flyerKey = '', string $entityStatus = '',  $entityCode = self::ENTITY_CODE, string $regEx = self::REGEX_URL)
    {
        parent::__construct($url,$regEx);
        $this->setId($id);
        $this->setFlyerKey($flyerKey);
        $this->setEntityStatus($entityStatus);
        $this->setEntityCode($entityCode);
    }
    public function getId(): int
    {
        return $this->id;
    }
    private function setId(int $value): void
    {
        $this->id = $value;
    }

    public function getFlyerKey(): string
    {
        return $this->flyerKey;
    }
    private function setFlyerKey(string $value): void
    {
        $this->flyerKey = $value;
    }

    public function getEntityCode(): string
    {
        return $this->entityCode;
    }
    private function setEntityCode(string $value): void
    {
        $this->entityCode = $value;
    }
    public function getEntityStatus(): string
    {
        return $this->entityStatus;
    }
    public function setEntityStatus(string $value): void
    {
        $this->entityStatus = $value;
    }
}
