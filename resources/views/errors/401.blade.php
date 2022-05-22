@extends('errors::illustrated-layout')
@php
use FQr\Log\Applications\Contracts\ILogHttpServerError;
use lib\Utils;
if ('ELB-HealthChecker/2.0' == trim(Utils::getHTTPUserAgent())) {
} else {
    app(ILogHttpServerError::class)->execute('401');
}
@endphp

<div class="row">
    <div class="col-sm-12  col-md-4 justify-content-center">
        @section('code', '401')
        @section('title', __('Página no encontrada'))
    </div>
</div>

@section('message', __('Unauthorized'))

