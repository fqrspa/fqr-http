<?php

namespace Tests\Unit;

use FQr\Entity\Domain\Exception\URLException;
use FQr\Entity\Domain\URLEntity;
use FQr\FlyerQR\Domain\FQRFacebookURLEntity;
use FQr\FlyerQR\Domain\FQRInstagramURLEntity;
use FQr\FlyerQR\Domain\FQRURLEntity;
use Tests\TestCase;

class URLEntityTest extends TestCase
{
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_url_vacia()
    {
        $entity = null;
        try{
            $entity = new URLEntity('');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity === null);

    }
    
    public function test_url_invalida()
    {
        $entity = null;
        try{
            $entity = new URLEntity('ww.cl');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity === null);

    }
    public function test_url_con_http()
    {
        $entity = null;
        try{
            $entity = new URLEntity('http://www.google.com');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity != null);

    }

    public function test_url_con_https()
    {
        $entity = null;
        try{
            $entity = new URLEntity('https://www.google.com');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity != null);

    }
    public function test_url_sin_http()
    {
        $entity = null;
        try{
            $entity = new URLEntity('www.google.com');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity != null);

    }

}
