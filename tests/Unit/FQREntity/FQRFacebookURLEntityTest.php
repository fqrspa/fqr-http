<?php

namespace Tests\Unit;

use FQr\Entity\Domain\Exception\URLException;
use FQr\FlyerQR\Domain\FQRFacebookURLEntity;
use Tests\TestCase;

class FQRFacebookURLEntityTest extends TestCase
{
    
    public function test_url_valida_http()
    {
        $entity = null;
        try{
            $entity = new FQRFacebookURLEntity(0,'FFFF-YYYY-XXXX','PA', 'http://www.facebook.com/conlink');
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
             $entity = new FQRFacebookURLEntity(0,'FFFF-YYYY-XXXX','PA', 'https://www.facebook.com/conlink');
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
            $entity = new FQRFacebookURLEntity(0,'FFFF-YYYY-XXXX','PA', 'www.facebook.com/conlink');
        }
        catch(URLException $ex){
            print_r($ex->getMessage());
        }
        print_r($entity);
        $this->assertTrue($entity != null);

    }}
