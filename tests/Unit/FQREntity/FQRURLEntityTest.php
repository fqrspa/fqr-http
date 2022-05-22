<?php

namespace Tests\Unit;

use FQr\Entity\Domain\Exception\URLException;
use FQr\FlyerQR\Domain\FQRURLEntity;
use Tests\TestCase;

class FQRURLEntityTest extends TestCase
{
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_url_valida_http()
    {
        $entity = null;
        try{
            $entity = new FQRURLEntity(0,'FFFF-YYYY-XXXX','PA', 'http://www.google.com');
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
            $entity = new FQRURLEntity(0,'FFFF-YYYY-XXXX','PA', 'https://www.google.com');
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
            $entity = new FQRURLEntity(0,'FFFF-YYYY-XXXX','PA', 'www.google.com');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        print_r($entity);
        $this->assertTrue($entity != null);

    }

}
