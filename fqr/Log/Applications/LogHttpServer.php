<?php
declare(strict_types=1);
namespace FQr\Log\Applications;

use FQr\Log\Applications\Contracts\ILogHttpServer;
use Illuminate\Support\Facades\Log;
use lib\Utils;

class LogHttpServer implements ILogHttpServer{
    public function execute(
        string $flyerKey,
        string $actionRequest,
        string $message = null
    ){
        Log::channel('LOG_HTTP_SERVER')->info([
            'flyerKey' => $flyerKey,
            'actionRequest' => $actionRequest,
            'message' => $message,
            'php_self' => Utils::getPHPSelf(),
            'httpReferer' =>  Utils::getHTTPReferer(),
            'remoteAddr' => Utils::getRemoteAddr(),
            'httpClientIp' => Utils::getHTTPClientIp(),
            'httpUserAgent' => Utils::getHTTPUserAgent(),
            'httpUserAgentName' => Utils::getHTTPUserAgentName()
        ]);
    }
}
