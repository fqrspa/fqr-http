<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Domain;




class FQRHomeURLEntity extends FQRURLEntity
{
    public const ENTITY_CODE = "home";

    public function __construct(string $url = null, int $id = 0, string $flyerKey = '', string $entityStatus = '', $regEx = self::REGEX_URL)
    {
        parent::__construct($url, $id, $flyerKey,$entityStatus, self::ENTITY_CODE, $regEx);
    }
}
