<?php

namespace App\Http\Requests\auth;

use FQr\Entity\Domain\EMailEntity;
use Illuminate\Foundation\Http\FormRequest;


class LoginRequest extends FormRequest
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
        return  [
            'email' => ['required', 'regex:' . EMailEntity::REGEX_EMAIL],
            'password' => 'required',
            recaptchaFieldName() => recaptchaRuleName(),
        ];
    }
    public function messages()
    {
        return [
            'email.required' => 'El usuario es requerido.',
            'email.regex' => 'El usuario debe ser un email.',
            'password.required' => 'La password es requerida.',
            'recaptcha' => 'Debe indicar que no es un robot'
        ];
    }
}
