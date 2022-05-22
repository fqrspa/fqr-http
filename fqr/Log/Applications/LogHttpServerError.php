<?php
declare(strict_types=1);
namespace FQr\Log\Applications;

use FQr\Log\Applications\Contracts\ILogHttpServerError;
use Illuminate\Support\Facades\Log;
use lib\Utils;

class LogHttpServerError implements ILogHttpServerError{
    public function execute(
        string $code
    ){
        Log::channel('LOG_HTTP_SERVER_ERROR')->info([
            'code' => $code,
            'php_self' => Utils::getPHPSelf(),
            'httpReferer' =>  Utils::getHTTPReferer(),
            'remoteAddr' => Utils::getRemoteAddr(),
            'httpClientIp' => Utils::getHTTPClientIp(),
            'httpUserAgent' => Utils::getHTTPUserAgent(),
            'httpUserAgentName' => Utils::getHTTPUserAgentName()
        ]);
    }
}
