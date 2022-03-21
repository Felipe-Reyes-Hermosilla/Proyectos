<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
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
            'titulo' => ['required', 'string', 'max:100'],
            'descripcion_rapida' => ['required', 'string', 'max:100'],
            'descripcion' => ['max:700'],
            'iframe' => ['max:2000'],
            'autor' => ['required'],
            'prioridad' => ['required'],
            'objetivo' => ['required'],
        ];
    }
}
