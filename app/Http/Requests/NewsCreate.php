<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsCreate extends FormRequest
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
            'title'       => ['required', 'string', 'min:3', 'max:150'],
            'author'      => ['required', 'string', 'max:15'],
            'description' => ['sometimes'],
            'image' => ['sometimes']
        ];;
    }

    public function attributes()
    {
        return [
            'title' => 'заголовок',
            'description' => 'описание',
            'author' => 'автор'
        ];
    }
}
