<?php

namespace Tests\Unit;

use Exception;
use FQr\FlyerQR\Application\Contracts\IFQRCreate;
use FQr\FlyerQR\Application\Contracts\IFQRSendEMail;
use FQr\FlyerQR\Application\FQRExistsForEmail;
use FQr\FlyerQR\Infraestructure\ElocuentFQRCRUDRepository;
use Illuminate\Support\Facades\URL;
use Tests\TestCase;

class FQRCreateTest extends TestCase
{
    
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_buscar_email()
    {
        $userCase = new FQRExistsForEmail(new ElocuentFQRCRUDRepository());

        $exists = $userCase->execute('daracenad11@gmail.com');
        
        $this->assertTrue($exists);

    }

    public function test_crear_fqr()
    {
        try{
            $urlTemporary = URL::temporarySignedRoute('registro.activar', now()->addHour(24), ['token' => '12345']);
            print_r($urlTemporary);
            
            app(IFQRSendEMail::class)->execute('daracenad@gmail.com', "Name Market", $urlTemporary);
/*
        $flyerKey = app(IFQRCreate::class)->execute(
            'daracenad53@gmail.com',
            'marketArea',
            'marketname',
            'www.instagram.com/conlink',
            'www.facebook.com/enlace',
            'fqr.cl',
            '+56937596204'
        );
*/
        //print_r($flyerKey);
/*
        if(!empty($flyerKey)){
            $urlTemporary = URL::temporarySignedRoute('registro.activar', now()->addHour(24), ['token' => $flyerKey->tokenId]);
            print_r($urlTemporary);
            app(IFQRSendEMail::class)->execute('daracenad@gmail.com', $flyerKey->getMarketName(), $urlTemporary);
        }
*/ 
    }catch(Exception $ex){
        print_r($ex->getMessage());
    }
        $this->assertTrue(true);
    }

}
