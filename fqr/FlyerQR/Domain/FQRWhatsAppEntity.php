<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Domain;

class FQRWhatsAppEntity extends FQRCelularEntity{
    public const ENTITY_CODE = "whatsapp";

    public function __construct(string $digits, int $id = 0, string $flyerKey = '',  string $entityStatus = '', string $regEx = parent::MOVIL_CHILE)
    {
        parent::__construct($digits,$id, $flyerKey, $entityStatus,  self::ENTITY_CODE, $regEx );
    }
}