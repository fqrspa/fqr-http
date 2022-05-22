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
        @yield('container')
        <a href="/" style="font-size: 12px; text-decoration: none">by powered FQR.cl</a>
    </div>
    
</body>

</html>
