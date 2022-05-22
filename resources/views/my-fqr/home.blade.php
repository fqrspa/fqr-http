@extends('layouts.pub')

@section('title', 'Mostrar mi Flyer QR')
@section('h2', 'Mostrar mi Flyer QR')
@section('container')

    <form method="post" action="{{ route('my-fqr.post') }}">
        @csrf
        <div class="row">
            <div class="col-12">
                <div class="input-group mb-1 has-validation">
                    <span class="input-group-text" id="basic-addon111">
                        <img style="height:23px" src="{{ asset('images/svg/envelope.svg') }}">
                    </span>
                    <input type="email" name="txtUserEmail" id="txtUserEmail" value="{{ old('txtUserEmail') }}"
                        class="form-control" placeholder="Usuario email" aria-label="email"
                        aria-describedby="basic-addon111" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                {!! htmlFormSnippet() !!}
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button id="btn_registrarme" type="submit" class="btn btn-success btn-lg text-light">Buscar</button>
            </div>
        </div>
        @if ($errors->any())
            <div class="row">

                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif
    </form>
@endsection
