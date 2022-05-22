<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {!! htmlScriptTagJsApi() !!}
</head>

<body>
<div class="container-fluid p-0">
    <div class="container" style="max-width: 500px">
        <a href="/" style="text-decoration: none;color:black">
        <h1 class="m-0 mt-1">Flyer QR</h1></a>
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
        <h2>@yield('h2')</h2>
        @yield('container')
        
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <a href="https://teknechile.cl" style="font-size: 12px; text-decoration: none">by powered teknechile.cl</a>
        </div>
    </div>
</body>

</html>
