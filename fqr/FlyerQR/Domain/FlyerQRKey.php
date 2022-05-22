<?php
declare(strict_types=1);
namespace FQr\FlyerQR\Domain;

final class FlyerQRKey{
    private $flyerQRKey;
    public function __construct(string $flyerQRKey = null)
    {
        $this->setFlyerQRKey($flyerQRKey);
    }
    public function getFlyerQRKey():string{
        return $this->flyerQRKey;
    }
    private function setFlyerQRKey(string $flyerQRKey){
        if($flyerQRKey == null){
            throw new InvalidFlyerQRKey('La valor de la llave no puede ser vacio');
        }
        $this->flyerQRKey = $flyerQRKey;
    }
}