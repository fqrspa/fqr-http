<?php

namespace Tests\Unit;

use Exception;
use FQr\Entity\Applications\Contracts\IEntityFindForProperty;
use Tests\TestCase;

class EntityFindForPropertyTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_existe()
    {
        try {
            $return = app(IEntityFindForProperty::class)->execute(
                'bank','name'
            );
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            $this->assertTrue(false);
            return;
        }

        print_r($return);
        $this->assertTrue(true);
    }
    
    public function test_no_existe()
    {
        $rtn = false;
        try {
            $return = app(IEntityFindForProperty::class)->execute(
                'daracenadx@gmail.com','name'
            );
            dd($return);
            
        } catch (Exception $ex) {
            print_r($ex->getMessage()); 
            $this->assertTrue(true);
            return;
        }

        
        $this->assertTrue(false); 
    }
    
}
