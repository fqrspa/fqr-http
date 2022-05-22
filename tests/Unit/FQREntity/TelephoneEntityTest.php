<?php

namespace Tests\Unit;

use FQr\Entity\Domain\Exception\CelularException;
use FQr\Entity\Domain\CelularEntity;
use Tests\TestCase;

class TelephoneEntityTest extends TestCase
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
            
            $entity = new  CelularEntity('','');
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
            $entity = new CelularEntity('77','4444');
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
            $entity = new CelularEntity('56', '937596204');
        }
        catch(CelularException $ex){
            print_r($ex->getMessage());
        }
        $this->assertTrue($entity != null);

    }

}
