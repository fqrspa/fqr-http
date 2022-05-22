<?php

namespace Tests\Unit;

use FQr\Entity\Domain\Exception\URLException;
use FQr\FlyerQR\Domain\FQRInstagramURLEntity;
use Tests\TestCase;

class FQRInstagramURLEntityTest extends TestCase
{
    
    public function test_url_valida_http()
    {
        $entity = null;
        try{
            $entity = new FQRInstagramURLEntity('www.instagram.com/conlink',0,'FFFF-YYYY-XXXX','PA');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity != null);

    }
    public function test_url_valida_https()
    {
        $entity = null;
        try{
             $entity = new FQRInstagramURLEntity('https://www.instagram.com/conlink',0,'FFFF-YYYY-XXXX','PA');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        print_r($entity);
        $this->assertTrue($entity != null);

    }
    public function test_url_valida_sin_http()
    {
        $entity = null;
        try{
            $entity = new FQRInstagramURLEntity('www.instagram.com/conlink',0,'FFFF-YYYY-XXXX','PA');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        print_r($entity);
        $this->assertTrue($entity != null);

    }

    public function test_Buscar_Instagram_Por_FlyerKey()
    {
        $entity = null;
        try{
            $entity = new FQRInstagramURLEntity('www.instagram.com/conlink',0,'FFFF-YYYY-XXXX','PA');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        print_r($entity);
        $this->assertTrue($entity != null);

    }

}
