<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="{{ asset('js/app.js') }}"></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="container-fluid p-0">
    <div class="container" style="max-width: 500px">
        <a href="/" style="text-decoration: none;color:black">
        <h3 class="m-0 mt-1">Flyer QR</h3></a>
        <style>
            .hr {
                height: 0;
                border-top: 1px solid black;
            }
            .hr hr {
                display: none
            }
        </style>
   <a class="log-out-btn" href="#" onclick="event.preventDefault();document.getElementById('logout-form').submit();"> Logout </a>

   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
    </form>
           <div class="row p-0">
            <div class="col-12">
                <div class="hr">
                    <hr />
                </div>
            </div>
        </div>
    
        @yield('container')
    </div>
    <div class="row">
        <div class="col-sm-12 text-center">
            <a href="teknechile.cl" style="font-size: 12px; text-decoration: none">by powered teknechile.cl</a>
        </div>
    </div>
</body>

</html>
