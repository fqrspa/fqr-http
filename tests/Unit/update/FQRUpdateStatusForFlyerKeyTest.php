<?php

namespace Tests\Unit;

use Exception;
use FQr\FlyerQR\Application\Contracts\IFQRUpdateStatusForFlyerKey;
use Tests\TestCase;

class FQRUpdateStatusForFlyerKeyTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_existe()
    {
        try {
            $rtn = app(IFQRUpdateStatusForFlyerKey::class)->execute(
                'CQ2LH-REXD-RTN9-1AUNU-67J8-4645O-4LB8A-2XN7L','XX'
            );
            print_r( $rtn);
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            $this->assertTrue(false);
        }
        
        $this->assertTrue(true);
    }
    
    public function test_no_existe()
    {
        try {
            $rtn = app(IFQRUpdateStatusForFlyerKey::class)->execute(
                'A1CCLX-P6BHP-XV36T-JU6JJ-ZGMQU-68B2C-ZS6E-9LHV4','XX'
            );
            print_r($rtn);
            $this->assertTrue(false);
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            $this->assertTrue(true);
        }
        
        
    }
    
}
