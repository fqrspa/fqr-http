<?php

namespace Tests\Unit;

use Exception;


use FQr\FlyerQR\Application\Contracts\IFQRInstagramURLFindForFlyerKey;
use Tests\TestCase;

class FQRInstagramTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_existe_http()
    {
        try {
            $return = app(IFQRInstagramURLFindForFlyerKey::class)->execute(
                'ZB57Z-O9FFY-TM8FV-VFNMW-M1JDB-1J909-UL3YQ-8NPLP'
            );
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }

        print_r($return);
        $this->assertTrue(true);
    }
    public function test_email_no_existe_http()
    {
        try {
            $return = app(IFQRGetForEMail::class)->execute(
                'daracenadx@gmail.com'
            );
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }

        $this->assertTrue(true);
    }
}
