<?php

namespace Tests\Unit;

use FQr\Entity\Domain\CelularEntity;
use FQr\Entity\Domain\Exception\CelularException;
use FQr\FlyerQR\Domain\FQRWhatsAppEntity;
use Tests\TestCase;

class FQRWhatsAppEntityTest extends TestCase
{
    
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_vacio()
    {
        $entity = null;
        try{
            
            $entity = new  FQRWhatsAppEntity(0,'FFFF-XXXX-YYYY','','','');
        }
        catch(CelularException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity === null);

    }
    
    public function test_invalid()
    {
        $entity = null;
        try{
            $entity = new FQRWhatsAppEntity(0,'FFFF-XXXX-YYYY','A','77','4444');
        }
        catch(CelularException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity === null);

    }
    public function test_telephone()
    {
        $entity = null;
        try{
            $entity = new FQRWhatsAppEntity(0,'FFFF-XXXX-YYYY','A','56', '937596204');
        }
        catch(CelularException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity != null);

    }

}
