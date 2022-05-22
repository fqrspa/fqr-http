@extends('layouts.pub')

@section('title', 'Mensaje FQR')
@section('h2', 'Mensaje de FLyer QR')
@section('container')

    @switch($action[0])
        @case('registrar')
            <div class="row">
                <div class="col-12 d-grid">
                    <p>Usted no aparece en nuestros registros</p>
                    <p>Obtenga su Flyer QR</p>
                </div>
            </div>
            <div class="row">
                <div class="col-12 d-grid">
                    <button class="btn btn-primary" onclick="location.href='{{ route('registrarme.index') }}'">
                        Crear Mi Flyer QR
                    </button>
                </div>
            </div>

        @break
        @case('activar')
            <div class="row">
                <div class="col-12 d-grid">
                    <p>Aún no ha activado su cuenta.</p>
                    <p>Por favor busque en su email, mensaje de activación o solicite nuevamente la activación.</p>
                    <p>Presionando el boton, "Reenviar activación",se enviará un nuevo email a su usuario :
                        <strong>{{ $email }}</strong>
                    </p>
                </div>
            </div>
            <div class="row">
                <form id="userQRForm" class="needs-validation" name="userQRForm " method="post"
                    action="{{ route('fqr.reenviarActivacion') }}">
                    @csrf
                    {{ csrf_field() }}
                    <input type="hidden" name="email" value='{{ $email }}'>
                    <div class="col-12 d-grid">
                        <button id="btn_registrarme" type="submit" class="btn btn-success btn-lg text-light">Reenviar
                            activación</button>
                    </div>
                </form>
            </div>

        @break
        @default

    @endswitch


@endsection
