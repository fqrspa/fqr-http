<?php

namespace Tests\Unit;

use Exception;

use FQr\FlyerQR\Application\Contracts\IFQRFindForEMail;
use FQr\Log\Appliactions\Contracts\ILogHttpServerError;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class FQRFindForEMailUserCaseTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_existe()
    {
        try {
            $return = app(IFQRFindForEMail::class)->execute(
                'daracenad13@gmail.com'
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
            $return = app(IFQRFindForEMail::class)->execute(
                'daracenadx@gmail.com'
            );
            
        } catch (Exception $ex) {
            print_r($ex->getMessage()); 
            $this->assertTrue(true);
            return;
        }

        
        $this->assertTrue(false);   

        
    }
}
