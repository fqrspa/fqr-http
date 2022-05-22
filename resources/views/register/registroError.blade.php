@extends('layouts.pub')

@section('title', 'My Flyer')
@section('container')
@section('h2', 'No te pudimos registrar')

<p>Se ha detectado problemas para registrarse, por favor intente más tarde</p>
<p>{{$error}}</p>


@endsection