<?php

namespace App\Http\Requests\Register;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class FQRRecordRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $regExpEMail =
            '/^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/';

        $regExpCelular =
            '/^(\+?56)?(\s?)(0?9)(\s?)[9876543]\d{7}$/';

        $regUrlFacebook =
            '/(?:https?:\/\/)?(?:www\.)?facebook\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/';

        $regUrlInstagram =
            '/(?:https?:\/\/)?(?:www\.)?instagram\.com\/.(?:(?:\w)*#!\/)?(?:pages\/)?(?:[\w\-]*\/)*([\w\-\.]*)/';

        $regUrl =
            "/^(https?|s?ftp):\/\/(((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:)*@)?(((\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5])\.(\d|[1-9]\d|1\d\d|2[0-4]\d|25[0-5]))|((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)+(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?)(:\d*)?)(\/((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)+(\/(([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)*)*)?)?(\?((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|[\uE000-\uF8FF]|\/|\?)*)?(#((([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(%[\da-f]{2})|[!\$&'\(\)\*\+,;=]|:|@)|\/|\?)*)?$/";

        $rules = [
            'txtMarketName' => 'required',
            'txtMarketArea' => 'required',
            /*recaptchaFieldName() => recaptchaRuleName()*/
        ];
        
        $rules['txtUserEmail'] = [
            'required', 'regex:' . $regExpEMail,
            Rule::unique('flyers','email')
        ];
        if (request('chkWhatsappDigits') === 'on') {
            $rules['txtWhatsappDigits'] = ['required', 'regex : ' . $regExpCelular];
        }

        if (request('chkFacebook') === 'on') {
            $rules['txtFacebook'] = ['required', 'regex:' . $regUrlFacebook];
        }
        if (request('chkInstagram') === 'on') {
            $rules['txtInstagram'] = ['required', 'regex:' . $regUrlInstagram];
        }

        if (request('chkHomePage') === 'on') {
            $rules['txtHomePage'] = ['required', 'regex:' . $regUrl];
        }

        if (request('chkAddress') === 'on') {
            $rules['txtMarketActivity'] = 'required';
            $rules['txtCity'] = 'required';
            $rules['txtStreet'] = 'required';
            $rules['txtInformationAdditional'] = 'required';
        }

        if (request('chkBankAccount') === 'on') {
            $rules['cmbBankCode'] = 'required';
            $rules['cmbAccountTypeCode'] = 'required';
            $rules['txtAccountNumber'] = 'required';
            $rules['txtClientName'] = 'required';
            $rules['txtClientAccoutEmail'] = ['required', 'regex:' . $regExpEMail];
        }
        return $rules;
    }

    public function messages()
    {
        $messages = [
            'txtUserEmail.required' => 'El usuario es requerido.',
            'txtUserEmail.unique' => 'El usuario esta registrado.',
            'txtUserEmail.regex' => 'El usuario debe ser un email.',
            'txtMarketName.required' => 'El nombre de su comercio es requerido.',
            'txtMarketArea.required' => 'El rubro de tu comercio es requerido.',
            /*'recaptcha' => 'Debe indicar que no es un robot'*/
        ];
        if (request('chkWhatsappDigits') === 'on') {
            $messages['txtWhatsappDigits.required'] = 'El número de Whatsapp es requerido.';
            $messages['txtWhatsappDigits.regex'] = 'El campo Whatsapp debe ser un celular.';
        }
        if (request('chkFacebook') === 'on') {
            $messages['txtFacebook.required'] = 'El link de Facebook es requerido.';
            $messages['txtFacebook.regex'] = 'El link de Facebook no es valido.';
        }
        if (request('chkInstagram') === 'on') {
            $messages['txtInstagram.required'] = 'El link de Instagram es requerido.';
            $messages['txtInstagram.regex'] = 'El link de Instagram no es valido.';
        }
        if (request('chkHomePage') === 'on') {
            $messages['txtHomePage.required'] = 'El link de Home Page es requerido.';
            $messages['txtHomePage.regex'] = 'El link de Home Page no es valido.';
        }
        if (request('chkAddress') === 'on') {
            $messages['txtMarketActivity.required'] = 'Es un Mercado,Galeria, Feria es requerido.';
            $messages['txtCity.required'] = 'La ciudad y comuna es requerido.';
            $messages['txtStreet.required'] = 'La calle y Número es requerido.';
            $messages['txtInformationAdditional.required'] = 'El Nº depto,oficina,puesto es requerido.';
        }
        if (request('chkBankAccount') === 'on') {
            $messages['cmbBankCode.required'] = 'El banco es requerido.';
            $messages['cmbAccountTypeCode.required'] = 'El tipo de cuenta es requerido.';
            $messages['txtAccountNumber.required'] = 'El número de la cuenta es requerido.';
            $messages['txtNameClient.required'] = 'El nombre del titular es requerido.';
            $messages['txtAccountEmailClient.required'] = 'El email del titular es requerido.';
            $messages['txtAccountEmailClient.regex'] = 'El email del titular debe ser valido.';
        }

        return $messages;
    }
}
