<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'tags' => 'required',
            'image' => 'required|mimes:jpeg,jpg'
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Введите заголовок',
            'description.required' => 'Введите текст поста',
            'image.required' => 'Загрузите фото',
            'image.mimes' => 'Загрузите фото в формате jpeg или jpg',
            'tags.required' => 'Введите теги',
        ];
    }
}
