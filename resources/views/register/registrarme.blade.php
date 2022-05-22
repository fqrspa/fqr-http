@extends('layouts.pub')

@section('title', 'registrarme')
@section('container')
@section('h2', 'Quiero un QR')

<form id="userQRForm" class="needs-validation" name="userQRForm " method="post"
    action="{{ route('registrarme.new') }}">
    @csrf
    {{ csrf_field() }}

    <div class="row">
        <div class="col-12">
            <!-- email usuario -->
            <div class="input-group mb-1 has-validation">
                <span class="input-group-text" id="basic-addon111">
                    <img style="height:23px" src="{{ asset('images/svg/envelope.svg') }}">
                </span>
                <input type="email" name="txtUserEmail" id="txtUserEmail" value="{{ old('txtUserEmail') }}"
                    class="form-control" placeholder="Usuario email" aria-label="email"
                    aria-describedby="basic-addon111" required>
            </div>
            <!-- tipo de negocio -->
            <div class="input-group mb-1 has-validation">
                <span class="input-group-text" id="basic-addon2">
                    <img class='shop-svg-color' style="height:23px" src="{{ asset('images/svg/shop.svg') }}">
                </span>
                <input type="text" name="txtMarketName" id="txtMarketName" value="{{ old('txtMarketName') }}"
                    class="form-control" placeholder="Nombre de tu comercio" aria-label="Nombre de tu empresa"
                    aria-describedby="basic-addon2" required>
            </div>
            <!-- tipo de negocio -->
            <div class="input-group mb-1 has-validation">
                <span class="input-group-text" id="basic-addon2">
                    <img class='shop-svg-color' style="height:23px"
                        src="{{ asset('images/svg/hand-index-thumb.svg') }}">
                </span>
                <input type="text" name="txtMarketArea" id="txtMarketArea" value="{{ old('txtMarketArea') }}"
                    class="form-control" placeholder="Cual es tu rubro" aria-label="Cual es tu rubro"
                    aria-describedby="basic-addon2" required>
            </div>
        </div>
    </div>
    <h5 class="mt-1 mb-0">Mis accesos publicos son :</h5>
    <hr class="mt-1 mb-1">


    <!-- whatsapp -->
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1">
                    <div class="form-check form-switch has-validation">
                        <input type="checkbox" name="chkWhatsappDigits" id="chkWhatsappDigits"
                            {{ old('chkWhatsappDigits') ? ' checked' : '' }}
                            onchange="ctrlEnabled('#chkWhatsappDigits', '#txtWhatsappDigits')" role="switch"
                            class="form-check-input">
                    </div>
                    <img class='whatsapp-svg-color' style="height:23px" src="{{ asset('images/svg/whatsapp.svg') }}">
                </span>
                <input type="text" name="txtWhatsappDigits" id="txtWhatsappDigits"
                    value="{{ old('txtWhatsappDigits') }}" disabled class="form-control" placeholder="whatsapp"
                    aria-label="whatsApp" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <!-- facebook -->
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon1">
                    <div class="form-check form-switch">
                        <input type="checkbox" role="switch" name="chkFacebook" id="chkFacebook"
                            {{ old('chkFacebook') ? ' checked' : '' }}
                            onchange="ctrlEnabled('#chkFacebook', '#txtFacebook' )" class="form-check-input">
                    </div>
                    <img class='facebook-svg-color' style="height:23px" src='{{ asset('images/svg/facebook.svg') }}'
                        alt="Facebook">
                </span>
                <input type="text" name="txtFacebook" id='txtFacebook' disabled value="{{ old('txtFacebook') }}"
                    class="form-control" placeholder="facebook" aria-label="Facebook" aria-describedby="basic-addon1">
            </div>
        </div>
    </div>
    <!-- instagram -->
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon2">
                    <div class="form-check form-switch">
                        <input type="checkbox" role="switch" name="chkInstagram" id="chkInstagram"
                            {{ old('chkInstagram') ? ' checked' : '' }}
                            onchange="ctrlEnabled('#chkInstagram', '#txtInstagram' )" class="form-check-input">
                    </div>
                    <img class='instagram-svg-color' style="height:23px"
                        src="{{ asset('images/svg/instagram.svg') }}">
                </span>
                <input type="text" name="txtInstagram" id="txtInstagram" disabled value="{{ old('txtInstagram') }}"
                    class="form-control" placeholder="instagram" aria-label="Instagram"
                    aria-describedby="basic-addon2">
            </div>
        </div>
    </div>
    <!-- home page -->
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon2">
                    <div class="form-check form-switch">
                        <input type="checkbox" role="switch" name="chkHomePage" id="chkHomePage"
                            {{ old('chkHomePage') ? ' checked' : '' }}
                            onchange="ctrlEnabled('#chkHomePage', '#txtHomePage' )" class="form-check-input">
                    </div>
                    <img class='house-svg-color' style="height:23px" src="{{ asset('images/svg/house.svg') }}">
                </span>
                <input type="text" name="txtHomePage" id="txtHomePage" value="{{ old('txtHomePage') }}" disabled
                    class="form-control" placeholder="página" aria-label="Link a mi Pagina"
                    aria-describedby="basic-addon2">
            </div>
        </div>
    </div>
    <!-- Address -->
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon2">
                    <div class="form-check form-switch">
                        <input name="chkAddress" id="chkAddress" type="checkbox"
                            {{ old('chkAddress') ? ' checked' : '' }}
                            onchange="ctrAddressGroupEnabled('#collapseAddress', '#chkAddress', '#txtAddress');"
                            role="switch" class="form-check-input" data-toggle='collapse'
                            data-target='#collapseAddress'>
                    </div>
                    <img class='house-svg-color' style="height:23px" src="{{ asset('images/svg/geo-alt.svg') }}">
                </span>
                <input type="text" name="txtAddress" id="txtAddress" readonly value="dirección donde trabajo"
                    class="form-control" aria-label="Link a mi Pagina" aria-describedby="basic-addon2">
            </div>
        </div>
    </div>
    <!-- Address fields-->
    <div class="row">
        <div class="col-12">
            <div id="collapseAddress" class="collapse">
                <div class="card-body">
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1">
                            <img class='envelope-svg-color' src="{{ asset('images/svg/building.svg') }}">
                        </span>
                        <input type="text" name="txtMarketActivity" id="txtMarketActivity"
                            value="{{ old('txtMarketActivity') }}" class="form-control"
                            placeholder="Es un Mercado, Galeria, Feria y otro." aria-label="Actividad"
                            aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1">
                            <img class='envelope-svg-color' src="{{ asset('images/svg/compass.svg') }}">
                        </span>
                        <input type="text" name="txtCity" id="txtCity" value="{{ old('txtCity') }}"
                            class="form-control" placeholder="Ciudad Comuna" aria-label="ciudad, comuna"
                            aria-describedby="basic-addon1">
                    </div>

                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1">
                            <img class='envelope-svg-color' src="{{ asset('images/svg/signpost-2.svg') }}">
                        </span>
                        <input type="text" name="txtStreet" id="txtStreet" value="{{ old('txtStreet') }}"
                            class="form-control" placeholder="calle y Número" aria-label="calle y número"
                            aria-describedby="basic-addon1">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1">
                            <img class='envelope-svg-color' src="{{ asset('images/svg/pin-map.svg') }}">
                        </span>
                        <input type="text" name="txtInformationAdditional" id="txtInformationAdditional"
                            value="{{ old('txtInformationAdditional') }}" class="form-control"
                            placeholder="Nº de depto, oficina, puesto, local" aria-label="email"
                            aria-describedby="basic-addon1">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- bank account -->
    @php
    /*
    <div class="row">
        <div class="col-12">
            <div class="input-group mb-1">
                <span class="input-group-text" id="basic-addon2">
                    <div class="form-check form-switch">
                        <input name="chkBankAccount" id="chkBankAccount" type="checkbox"
                            onchange="ctrGroupEnabledInfoBankAccout('#collapseBankAccount', '#chkBankAccount', '#txtBankAccount');"
                            role="switch" {{ old('chkBankAccount') ? ' checked' : '' }} class="form-check-input"
                            data-toggle='collapse' data-target='#collapseBankAccount'>
                    </div>
                    <img class='house-svg-color' style="height:23px" src="{{ asset('images/svg/bank.svg') }}">
                </span>
                <input type="text" name="txtBankAccount" id="banckAccount" readonly
                    value="transferir tus pagos a mi cuenta" class="form-control" aria-label="Link a mi Pagina"
                    aria-describedby="basic-addon2">
            </div>
        </div>
    </div>

    <!-- bank fields -->
    <div class="row">
        <div class="col-12">
            <div id="collapseBankAccount" class="collapse">
                <div class="card-body">
                    <div class="input-group mb-1">
                        <label class="input-group-text" for="bankCode">
                            <img class='bank-svg-color' src="{{ asset('images/svg/bank.svg') }}">
                        </label>
                        <select class="form-select" name="cmbBankCode" id="cmbBankCode">
                            @if (!empty($collBankName))
                                <option value="" selected>Seleccione un banco</option>
                                @forelse ($collBankName as $bank)
                                    <option value="{{ $bank['code'] }}"
                                        {{ old('cmbBankCode') === $bank['code'] ? 'selected' : '' }}>
                                        {{ $bank['description'] }}</option>
                                @empty
                                    <option value="">No se encontro banco</option>
                                @endforelse

                            @else
                                <option value="">No se encontro banco</option>
                            @endif
                        </select>
                    </div>
                    <div class="input-group mb-1">
                        <label class="input-group-text" for="bankCountType">
                            <img class='bank-svg-color' src="{{ asset('images/svg/bank.svg') }}">
                        </label>
                        <select class="form-select" name="cmbAccountTypeCode" id="cmbAccountTypeCode">
                            @if (!empty($collBankCountType))
                                <option value="" selected>Tipo Cuenta</option>
                                @forelse ($collBankCountType as $bank)
                                    <option value="{{ $bank['code'] }}"
                                        {{ old('cmbAccountTypeCode') == $bank['code'] ? 'selected' : '' }}>
                                        {{ $bank['description'] }}</option>
                                @empty
                                    <option value="">No se encontro tipos de cuenta</option>
                                @endforelse
                            @else
                                <option value="" selected>No se encontro tipos de cuenta</option>
                            @endif
                        </select>
                    </div>

                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon2">
                            <img class='piggy-bank-svg-color' src="{{ asset('images/svg/piggy-bank.svg') }}">
                        </span>
                        <input type="text" class="form-control" name="txtAccountNumber" id="txtAccountNumber"
                            value="{{ old('txtAccountNumber') }}" placeholder="Número de cuenta destino"
                            aria-label="Username" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon2">
                            <img class='person-svg-color' src="{{ asset('images/svg/person.svg') }}">
                        </span>
                        <input type="text" class="form-control" name="txtClientName" id="txtClientName"
                            value="{{ old('txtClientName') }}" placeholder="Nombre destinatario"
                            aria-label="Username" aria-describedby="basic-addon2">
                    </div>
                    <div class="input-group mb-1">
                        <span class="input-group-text" id="basic-addon1">
                            <img class='envelope-svg-color' src="{{ asset('images/svg/envelope.svg') }}">
                        </span>
                        <input type="text" name="txtClientAccoutEmail" id="txtClientAccoutEmail"
                            value="{{ old('txtClientAccoutEmail') }}" class="form-control" placeholder="Correo"
                            aria-label="email" aria-describedby="basic-addon1">
                    </div>

                </div>
            </div>
        </div>
    </div>
    */
    @endphp
    <div class="row">
        <div class="col-12">
            {!! htmlFormSnippet() !!}
        </div>
    </div>
    <div class="row ml-0 mr-0 b-0">
        <div class="       col-12">
            <p class="m-0 b-0">
                Al "Registrarme" acepto las <a href="{{ route('condiciones.de.uso') }}" target="_blank">Condiciones
                    de uso</a>.
            </p>

        </div>
    </div>
    <div class="row">
        <div class="col-12 text-center">
            <button id="btn_registrarme" type="submit" class="btn btn-success btn-lg text-light">Registrarme</button>
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
<script>
    ctrlEnabled('#chkWhatsappDigits', '#txtWhatsappDigits');
    ctrlEnabled('#chkFacebook', '#txtFacebook');
    ctrlEnabled('#chkInstagram', '#txtInstagram');
    ctrlEnabled('#chkHomePage', '#txtHomePage');

    ctrAddressGroupEnabled('#collapseAddress', '#chkAddress', '#txtAddress');
    ctrGroupEnabledInfoBankAccout(
        '#collapseBankAccount', '#chkBankAccount', '#txtBankAccount');

    //-----------------------------------------------------------------------------
    //-----------------------------------------------------------------------------
    //-----------------------------------------------------------------------------
    //-----------------------------------------------------------------------------
    function ctrlAssignValid(ctrl, b) {
        if (b) {
            $(ctrl).removeClass('is-invalid');
            $(ctrl).addClass('is-valid');
        } else {
            $(ctrl).removeClass('is-valid');
            $(ctrl).addClass('is-invalid');
        }
    }
    //ctrlAssignValid
    //-----------------------------------------------------------------------------
    //-----------------------------------------------------------------------------
    function ctrlEnabled(check, ctrlName) {
        $(ctrlName).removeClass('is-invalid');
        $(ctrlName).removeClass('is-valid');

        if ($(check).prop('checked')) {
            $(ctrlName).removeAttr('disabled');
            $(ctrlName).prop('required', true);
        } else {
            $(ctrlName).prop('disabled', 'disabled');
            $(ctrlName).prop('required', false);
            $(ctrlName).val('');
        }
    }
    //ctrlEnabled
    //-----------------------------------------------------------------------------
    //-----------------------------------------------------------------------------
    function ctrAddressGroupEnabled(collapse, check, ctrlName) {
        ctrGroupEnabled(collapse, check, ctrlName);

        ctrlEnabled(check, '#txtMarketActivity');
        ctrlEnabled(check, '#txtCity');
        ctrlEnabled(check, '#txtStreet');
        ctrlEnabled(check, '#txtInformationAdditional');
        if (!$(check).prop('checked')) {
            $('#txtMarketActivity').val('');
            $('#txtCity').val('');
            $('#txtStreet').val('');
            $('#txtInformationAdditional').val('');
        }
    }

    function ctrGroupEnabledInfoBankAccout(collapse, check, ctrlName) {
        ctrGroupEnabled(collapse, check, ctrlName);
        ctrlEnabled(check, '#cmbBankCode');
        ctrlEnabled(check, '#cmbAccountTypeCode');
        ctrlEnabled(check, '#txtAccountNumber');
        ctrlEnabled(check, '#txtNameClient');
        ctrlEnabled(check, '#txtAccountEmailClient');

        if (!$(check).prop('checked')) {
            $('#cmbBankCode').val('null');
            $('#cmbAccountTypeCode').val('null');
            $('#txtAccountNumber').val('');
            $('#txtNameClient').val('');
            $('#txtAccountEmailClient').val('');
        }
    }


    function ctrGroupEnabled(collapse, check, ctrlName) {
        if ($(check).prop('checked')) {
            $(ctrlName).removeAttr('disabled');
            $(ctrlName).css('background-color', 'white');

            $(collapse).collapse({
                toggle: true
            })
        } else {
            $(ctrlName).css('background-color', '');
            $(ctrlName).prop('disabled', 'disabled');
            $(collapse).collapse({
                toggle: false
            });
        }
    }
    // ----------------
</script>

@endsection
