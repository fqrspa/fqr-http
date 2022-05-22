@extends('layouts.pub')

@section('title', 'My Flyer')
@section('container')
    <h4 class="mt-1">Condiciones de uso</h4>
    <p>
        FQR es un servicio construido con técnología WEB que permite asociar un código QR generado por nuestro sistema, para
        contacto con acceso publico sin restricciones de consulta por servicios en la WEB .
    </p>
    <p>
        Cuando tu te registras has aceptado que el sistema asocie el código QR generado con la información de contacto que
        tu inscribas para ser accedido en forma publica, como: redes sociales, mensajería, dirección geográfica de tu
        negocio, link a paginas
        web e información de tus cuentas para transferencia.
    </p>

    <h5>Políticas de datos.</h5>
    <ol class="list-group list-group-numbered">
        <li class="list-group-item">
            La información proporcionada de tus redes sociales o diversos tipos de contactos, a excepción de tu "usuario
            email", son por la naturaleza del servicio, públicos.
        </li>
        <li class="list-group-item">
            Nuestro sistema podría utilizar cookies con el objetivo de recopilara información para la comprensión del
            uso de nuestros servicios.
        </li>

    </ol>


    <h5>Información de registro</h5>
    <ol class="list-group list-group-numbered">
        <li class="list-group-item">
            El servicio FQR registra su email de contacto como usuario.
        </li>
        <li class="list-group-item">
            La información registrada de sus redes sociales o datos de contacto, quedarán
            asociados a su usuario.
        </li>
        <li class="list-group-item">Verifique los datos ingresados, la
            información que ingreso son de su entera responsabilidad.</li>
        <li class="list-group-item">Si desea actualizar la información registrada, deberá
            tener
            activo el servicio.</li>
    </ol>
    <h5>Condiciones del servicio</h5>
    <ol class="list-group list-group-numbered">
        <li class="list-group-item">Se enviara a su email de contacto un enlace para
            confirmar la activación
            del servicio. </li>
        <li class="list-group-item">Luego de confirmar la activación del servicio, el
            servicio quedará habilitado
            por un periodo de 24 horas, en espera de la confirmación de pago.</li>
        <li class="list-group-item">Transcurridos las 24 Horas de la activación del servicio
            y no se ha recibido
            la confirmación de pago, su servicio quedará
            desactivado.</li>
        <li class="list-group-item">El servicio tiene vigencia mensual (previa confirmación
            y pago del servicio).
        </li>
        <li class="list-group-item">Si la información publicada lleva a contenido que dañe,
            promueva conductas perjudiciales su cuenta y la información será bloqueada.
        </li>
        <li class="list-group-item">El valor mensual del servicio es de CLP 3800 CLP, pesos
            chilenos. (o su
            equivalente a 0,12 UF).
        </li>
    </ol>

@endsection
