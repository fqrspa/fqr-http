@extends('errors::illustrated-layout')
@php
use FQr\Log\Applications\Contracts\ILogHttpServerError;
use lib\Utils;
if ('ELB-HealthChecker/2.0' == trim(Utils::getHTTPUserAgent())) {
} else {
    app(ILogHttpServerError::class)->execute('500');
}
@endphp

<div class="row">
    <div class="col-sm-12  col-md-4 justify-content-center">
        @section('code', '500')
        @section('title', __('Server Error'))
    </div>
</div>
@section('message', __('Server Error'))
