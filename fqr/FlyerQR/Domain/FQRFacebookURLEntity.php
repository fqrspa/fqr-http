<?php

declare(strict_types=1);

namespace FQr\FlyerQR\Domain;

use FQr\Entity\Domain\URLEntity;


final class FQRFacebookURLEntity extends FQRURLEntity
{

    public const ENTITY_CODE = "facebook";
    public const REGEX_URL_FACEBOOK =
    '/(?:https?:\/\/)?(?:www\.)?facebook\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/';
  //'/(https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|www\.[a-zA-Z0-9][a-zA-Z0-9-]+[a-zA-Z0-9]\.[^\s]{2,}|https?:\/\/(?:www\.|(?!www))[a-zA-Z0-9]+\.[^\s]{2,}|www\.[a-zA-Z0-9]+\.[^\s]{2,})/'
  //funcionando
  //'/(?:https?:\/\/)?(?:www\.)?facebook\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/';
    public function __construct(string $urlFacebook = null,int $id = 0, string $flyerKey = '', string $entityStatus = '',  string $regEx = self::REGEX_URL_FACEBOOK)
    {
        parent::__construct($urlFacebook, $id, $flyerKey, $entityStatus,  self::ENTITY_CODE, $regEx);
    }
}
