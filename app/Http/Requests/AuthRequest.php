<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
        return [
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Поле "email" является обязательным',
            'email.email' => 'Поле "email" должно содержать email',
            'password.min' => 'Пароль должен содержать не менее 8 символов',
            'password.required' => 'Пароль является обязательным',
        ];
    }
}
