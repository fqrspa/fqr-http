<?php

namespace App\Http\Requests\User;

use FQr\Entity\Domain\EMailEntity;
use Fqr\Lib\RegEx;
use Illuminate\Foundation\Http\FormRequest;

class UserFQRRequest extends FormRequest
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
        //$rules = [
        //    recaptchaFieldName() => recaptchaRuleName()
        //];

        $rules['txtUserEmail'] = [
            'required', 'regex:' . EMailEntity::REGEX_EMAIL,
            //Rule::exists('flyers','email')
        ];
        return $rules;
    }
    public function messages()
    {
        $messages = [
            'txtUserEmail.required' => 'El usuario es requerido.',
            'txtUserEmail.exists' => 'El usuario NO esta registrado.',
            'txtUserEmail.regex' => 'El usuario debe ser un email.',
            'recaptcha' => 'Debe indicar que no es un robot'
        ];
        return $messages;
    }
}
