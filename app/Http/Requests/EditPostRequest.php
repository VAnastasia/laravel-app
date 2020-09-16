<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditPostRequest extends FormRequest
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
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Введите заголовок',
            'description.required' => 'Введите текст поста',
            'image.mimes' => 'Загрузите фото в формате jpeg или jpg'
        ];
    }
}
