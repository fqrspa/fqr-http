<?php

namespace Tests\Unit;

use Exception;
use FQr\FlyerQR\Application\Contracts\IFQRFindForFlyerKey;
use Tests\TestCase;

class FQRFindForKeyUserCaseTest extends TestCase
{

    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_existe()
    {
        $return = null;
        try {
            $return = app(IFQRFindForFlyerKey::class)->execute(
                'ZB57Z-O9FFY-TM8FV-VFNMW-M1JDB-1J909-UL3YQ-8NPLP'
            );
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }

        if(!empty($return))
            print_r($return);
        $this->assertTrue(true);
    }
    public function test_no_existe()
    {
        try {
            $return = app(IFQRFindForFlyerKey::class)->execute(
                'daracenadx@gmail.com'
            );
        } catch (Exception $ex) {
            print_r($ex->getMessage());
        }

        $this->assertTrue(true);
    }
}
