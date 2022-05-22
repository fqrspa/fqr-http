@extends('layouts.qr')

@section('title', 'My Flyer')


@section('container')

    @php

    function x($arr, $entiyCode)
    {
        foreach ($arr as $key => $object) {
            if ($object->getEntityCode() == $entiyCode) {
                return $object;
            }
        }
        return null;
    }

    $whatsapp = array_filter($flyerQREntity->getTelephones(), function ($obj) {
        if (isset($obj) && $obj->getEntityCode() == 'whatsapp') {
            return true;
        }
        return false;
    });
    $homePage= x($flyerQREntity->getLinks(),  'homePage') ;
    $instagram = x($flyerQREntity->getLinks(), 'instagram');
    $facebook = x($flyerQREntity->getLinks(), 'facebook');
    $addresses  =x($flyerQREntity->getAddresses(), 'empresa');

    $bankAccounts =x($flyerQREntity->getBankAccounts(), 'transfer01');

    @endphp
    <div class="row">
        <div class="col-12">
            <h4 class="p-0 b-0">{{ $flyerQREntity->getMarketName() }}</h4>
            <h5 class="p-0 b-0">{{ $flyerQREntity->getMarketArea() }}</h5>
        </div>
    </div>
    <style>
        .hr {
            height: 0;
            border-top: 1px solid black;
        }
        .hr hr {
            display: none
        }
    </style>
    <div class="row p-0">
        <div class="col-12">
            <div class="hr">
                <hr />
            </div>
        </div>
    </div>

    <div class="row justify-content-center p-1">
        <div class="col-sm-5 col-md-5 align-self-center">
            {!! QrCode::size(150)->generate('https://fqr.cl/mi-fqr/'.$flyerQREntity->getFlyerKey()) !!}
        </div>
        <div class="col-sm-7 col-md-7 p-1 gap-1 d-grid">
            @if (count($whatsapp))
                <button style="text-align:left;  padding-left:6px;background-color:#4dc247;color:white"
                    class="btn"
                    onclick="javascript:window.open('https://wa.me/{{ $whatsapp[0]->getDigits() }}', '_blank');">
                    <img class='svg-bg-white' style="height:20px;" src="{{ asset('images/svg/whatsapp.svg') }}"> |
                    Connectar a
                    Whatsapp</button>

            @endif
            @if (isset($facebook))
                <button style="text-align:left; padding-left:6px;background-color:#3b5998;color:white"
                    class="btn" onclick="javascript:window.open('{{ $facebook->getPath() }}', '_blank');">
                    <img class='svg-bg-white' style="height:20px" src="{{ asset('images/svg/facebook.svg') }}"> | Conectar
                    a
                    Facebook</button>
            @endif
            @if (isset($instagram))
                <button style="text-align:left; padding-left:6px;background-color:#c32aa3;color:white"
                    class="btn" onclick="javascript:window.open('{{ $instagram->getPath() }}', '_blank');">
                    <img class='svg-bg-white' style="height:20px" src="{{ asset('images/svg/instagram.svg') }}"> |
                    Conectar a
                    Instagram</button>
            @endif
            @if (isset($homePage))
                <button style="text-align:left; padding-left:6px;background-color:#ff5510;color:white"
                    class="btn" onclick="javascript:window.open('{{ $homePage->getPath() }}', '_blank');">
                    <img class='svg-bg-white' style="height:20px" src="{{ asset('images/svg/house.svg') }}"> | Ir a mi
                    sitio</button>
            @endif
            @if (isset($addresses))
                <button style="text-align:left; padding-left:6px;background-color:mediumorchid;color:white"
                    class="btn">
                    <img class='svg-bg-white' style="height:20px" src="{{ asset('images/svg/geo-alt.svg') }}"> | Me ubicas
                    en</button>
            @endif
            @if (isset($bankAccounts))
            <button style="text-align:left; padding-left:6px;background-color:red;color:white" class="btn">
                <img class='svg-bg-white' style="height:20px" src="{{ asset('images/svg/bank.svg') }}"> | Compra y Pagame
                en mi Banco</button>
                @endif
        </div>
    </div>
@endsection
