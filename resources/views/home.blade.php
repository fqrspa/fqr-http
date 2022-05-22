@extends('layouts.pub')

@section('title', 'Home Flyer QR')

@section('container')    
        <div class="row pt-0">
            <div class="col-12">
                    <p class='m-0'>Una innovadora forma de presentarse.</p>
                    <p class='m-0 mb-1'>Solicita tu código  QR, enlazalo a tus redes sociales y compartelo</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 col-md-4">
                <div class="justify-content-center text-center">
                    {!! QrCode::size(150)->generate('https://fqr.cl') !!}
                </div>
            </div>
            <div class="col-sm-12  col-md-8 justify-content-center">
                <div class="row pb-2 pt-2 m-1">
                    <div class="col-12 d-grid">
                        <a class="btn btn-primary" href="{{ route('registrarme.index') }}">
                            Regístrate y obtén tu Flyer QR
                        </a>
                    </div>
                </div>
                <div class="row pb-2 m-1">
                    <div class="col-12 d-grid">
                        <a class="btn btn-success" href="{{ route('mi-fqr.home') }}">
                            Mostrar Mi Flyer QR
                        </a>
                    </div>
                </div>
            </div>                
    </div>
    @endsection
