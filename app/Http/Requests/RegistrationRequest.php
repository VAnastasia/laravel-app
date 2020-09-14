<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegistrationRequest extends FormRequest
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
            'email' => 'required|email|unique:users',
            'login' => 'required|min:5',
            'password' => 'required|min:8',
            'password-repeat' => 'required|min:8|same:password',
            'image' => 'required|mimes:jpeg,jpg'
        ];
    }

    public function messages() {
        return [
            'email.required' => 'Поле "email" является обязательным',
            'email.email' => 'Поле "email" должно содержать email',
            'email.unique' => 'Пользователь с таким email уже существует',
            'login.required' => 'Поле "логин" является обязательным',
            'login.min' => 'Логин должен содержать не менее 5 символов',
            'password.min' => 'Пароль должен содержать не менее 8 символов',
            'password.required' => 'Пароль является обязательным',
            'password-repeat.same' => 'Пароли не совпадают',
            'password-repeat.required' => 'Поле "повтор пароля" является обязательным',
            'image.required' => 'Загрузите фото',
            'image.mimes' => 'Загрузите фото в формате jpeg или jpg'
        ];
    }
}
