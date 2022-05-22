<?php

namespace App\Http\Controllers\Fqr;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserFQRRequest;
use Exception;
use FQr\FlyerQR\Services\Contracts\IFQRFindForEMail;
use FQr\FlyerQR\Services\Contracts\IFQRFindForFlyerKey;
use FQr\FlyerQR\Services\Exception\FQRFindException;
use Illuminate\Http\Request;

use FQr\Log\Applications\Contracts\ILogHttpServer;

class MyFQRController extends Controller
{
    //

    public function home(ILogHttpServer $logHttpServer)
    {
        $logHttpServer->execute("public", "SOLICITAR_QR_CON_EMAIL");
        return view('my-fqr.home');
    }

    public function forFlyerKey(
        Request $request,
        IFQRFindForFlyerKey $findForFlyerKey,
        ILogHttpServer $logHttpServer
    ) {
        $flyerQREntity = $findForFlyerKey->execute($request->flyerKey);

        if ($flyerQREntity) {
            $logHttpServer->execute($request->flyerKey, "CLIENTE_SOLICITO_QR");
            return view('/my-fqr.FQR', compact('flyerQREntity'));
        } else {
            $logHttpServer->execute('NO_INGRESO_LLAVE', "CLIENTE_SOLICITO_QR");
            return view('register.userFQRInfo');
        }
    }

    public function forEmail(
        UserFQRRequest $request,
        IFQRFindForEMail $findForEMail,
        ILogHttpServer $logHttpServer
    ) {
        try {
            $flyerQREntity = $findForEMail->execute($request->txtUserEmail);
            $logHttpServer->execute($flyerQREntity->getFlyerKey(), "PROPIETARIO_SOLICITO_QR");
            
            switch ($flyerQREntity->getContractStatus()) {
                case "A":
                    return view('my-fqr.FQR', compact('flyerQREntity'));
                    break;
                default:
                    $action = ['activar'];
                    $email = $request->txtUserEmail;
                    return view('my-fqr.mensaje', compact(['action', 'email']));
                    break;
            }
        } catch (Exception $findExcepction) {

            $logHttpServer->execute($request->txtUserEmail, "PROPIETARIO_SOLICITO_QR_NO_EXISTE");
            $action = ['registrar'];
            return view('my-fqr.mensaje', compact('action'));
        }
    }
    //----------------------------------------

}
