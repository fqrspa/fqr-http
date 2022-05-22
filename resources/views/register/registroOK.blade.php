@extends('layouts.pub')
@section('title', 'My Flyer')
@section('container')
@section('h2', 'Bien venido, estas registrado')
    <div class="row">
        <div class="col-12">
            <p>Hemos enviado a tu casilla de correo, un mail con un link para confirmar tu identidad</p>
        </div>
    </div <div class="row pb-2 m-1">
    <div class="col-12 d-grid">
        <button class="btn btn-success" onclick="location.href='{{ route('mi-fqr.home') }}'">
            Mostrar Mi Flyer QR
        </button>
</div>

@endsection
