<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Domain;

use FQr\FlyerQR\Domain\FQRURLEntity;

final class FQRInstagramURLEntity extends FQRURLEntity
{
    public const ENTITY_CODE = "instagram";
    public const REGEX_URL_INSTAGRAM =
    '/(?:https?:\/\/)?(?:www\.)?instagram\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/';

    public function __construct(string $instagramURL = null, int $id = 0, string $flyerKey = '', $entityStatus = '', string $regEx = self::REGEX_URL_INSTAGRAM)
    {
        parent::__construct($instagramURL, $id, $flyerKey, $entityStatus, self::ENTITY_CODE, $regEx);
    }
}
