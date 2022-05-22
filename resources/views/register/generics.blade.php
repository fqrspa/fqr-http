@extends('layouts.pub')
@php
use FQr\Log\Applications\Contracts\ILogHttpServerError;
use lib\Utils;
if ('ELB-HealthChecker/2.0' == trim(Utils::getHTTPUserAgent())) {
} else {
    app(ILogHttpServerError::class)->execute('XXX');
}
@endphp
@section('title', 'registrarme')
@section('container')

@section('h2', 'Se ha producido un error')
        <p>
            Estamos trabajando para revisar el error
        </p>
    
@endsection




