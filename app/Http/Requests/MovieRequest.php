<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
            'name' => 'required',
            'launching_date' => 'required',
            'producer' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'La pelicula necesita un nombre',
            'launching_date.required' => 'La pelicula necesita una fecha de lanzamiento',
            'producer.required' => 'La pelicula necesita una productora',
        ];
    }
}
