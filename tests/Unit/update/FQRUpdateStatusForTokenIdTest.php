<?php

namespace Tests\Unit;

use Exception;
use FQr\FlyerQR\Application\Contracts\IFQRUpdateStatusForTokenId;
use Tests\TestCase;

class FQRUpdateStatusForTokenIdTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_existe()
    {
        try {
            $rtn = app(IFQRUpdateStatusForTokenId::class)->execute(
                'bc5FMZyMxZQA5VKHyehDsZ5tqKu0pAOylPpWoTZ8QoqvCqvZAe','XX'
            );
            print_r($rtn);
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            $this->assertTrue(false);
        }
        
        $this->assertTrue(true);
    }
    
    public function test_no_existe()
    {
        try {
            app(IFQRUpdateStatusForTokenId::class)->execute(
                'A1CCLX-P6BHP-XV36T-JU6JJ-ZGMQU-68B2C-ZS6E-9LHV4','XX'
            );
            print_r('Actualizado');
            $this->assertTrue(false);
        } catch (Exception $ex) {
            print_r($ex->getMessage());
            $this->assertTrue(true);
        }
        
        
    }
    
}
