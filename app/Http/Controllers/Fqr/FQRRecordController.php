<?php

namespace App\Http\Controllers\Fqr;

use App\Http\Controllers\Controller;
use App\Http\Requests\Register\FQRRecordRequest;
use Exception;
use FQr\Entity\Applications\Contracts\IEntityFindForProperty;
use FQr\Entity\Domain\AddressEntity;
use FQr\FlyerQR\Applications\Contracts\IFQRRecordNew;
use FQr\FlyerQR\Applications\Contracts\IFQRResendActivation;
use FQr\FlyerQR\Services\Contracts\IFQRUpdateStatusForTokenId;
use FQr\Log\Applications\Contracts\ILogHttpServer;
use Illuminate\Support\Facades\Request;


class FQRRecordController extends Controller
{

    public function condicionesDeUsoFQR()
    {
        return view('register.condicionesDeUsoFQR');
    }
    public function index(
        IEntityFindForProperty $findForProperty,
        ILogHttpServer $logHttpServer
    ) {
        $logHttpServer->execute('ANONIMOUS', "SOLICITUD_DE_REGISTRO", "INDEX");

        $collBankName = $findForProperty->execute('bank', 'name');
        $collBankCountType = $findForProperty->execute('bank', 'countType');


        return view(
            'register.registrarme',
            compact(
                [
                    'collBankName',
                    'collBankCountType'
                ]
            )
        );
    }

    //
    public function new(
        FQRRecordRequest $request,
        IFQRRecordNew $fqrRecordNew,
        ILogHttpServer $logHttpServer
    ) {
        try {
            $address = null;
            if (request('chkAddress') === 'on') {
                $address = new AddressEntity(
                    request("txtMarketActivity"),
                    '152',
                    request("txtCity"),
                    request("txtStreet"),
                    request("txtInformationAdditional")
                );
            }

            $flyerQREntity = $fqrRecordNew->execute(
                'registro.activar',
                request('txtUserEmail'),
                request('txtMarketArea'),
                request('txtMarketName'),
                request('txtInstagram'),
                request('txtFacebook'),
                request('txtHomePage'),
                request('txtWhatsappDigits'),
                $address
            );

            $logHttpServer->execute($flyerQREntity->getFlyerKey(), "CLIENTE_SOLICITUD_CREAR_QR", "CON_EXITO");
        } catch (Exception $ex) {
            $logHttpServer->execute(request('txtUserEmail'), "CLIENTE_SOLICITO_CREAR_QR", $ex->getMessage());
            return view('register.registroError', ['error' => $ex]);
        }
        return view('register.registroOK');
    }

    public function activarCuenta(
        Request $request,
        IFQRUpdateStatusForTokenId $fqrUpdateStatusForTokenId,
        ILogHttpServer $logHttpServer
    ) {
        $flyerQREntity = $fqrUpdateStatusForTokenId->execute(request('tokenId'), 'A');

        if ($flyerQREntity) {
            $logHttpServer->execute($flyerQREntity->getFlyerKey(), "CLIENTE_SOLICITO_ACTIVAR_QR", "CON_EXITO");
            return redirect()->route('my-fqr.forFlyerKey', [$flyerQREntity->getFlyerKey()]);
            //return view('my-fqr.FQR', compact('flyerQREntity'));
        } else {
            $logHttpServer->execute($flyerQREntity->getTokenId(), "CLIENTE_SOLICITO_ACTIVAR_QR", "SIN_EXITO");
            return view('register.userFQRInfo');
        }
    }
    public function resendActivation(
        Request $request,
        IFQRResendActivation $fqrResendActivation,
        ILogHttpServer $logHttpServer
    ) {
        try {
            $flyerQREntity = $fqrResendActivation->execute('registro.activar', 'register.mails.resend-activation', request('email'));

            if ($flyerQREntity) {
                $logHttpServer->execute($flyerQREntity->getFlyerKey(), "CLIENTE_SOLICITO_RE_ACTIVAR_QR", "CON_EXITO");
                return view('register.registroOK', compact('flyerQREntity'));
            } else {
                $logHttpServer->execute(request('tokenId'), "CLIENTE_SOLICITO_RE_ACTIVAR_QR", "SIN_EXITO");
                return view('register.userFQRInfo');
            }
        } catch (Exception $ex) {
            $logHttpServer->execute(request('email'), "CLIENTE_SOLICITO_RE_ACTIVAR_QR", "ERROR : " . $ex->getMessage());
            return view('register.generics');
        }
    }
}
