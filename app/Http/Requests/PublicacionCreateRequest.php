<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublicacionCreateRequest extends FormRequest
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
            'titulo'=>'required',
            'cuerpo'=>'required',
            'Id'=>'required',
        ];
    }

    public function messages()
    {
        return [
            'titulo.required' => 'El titulo de la publicacion debe ser ingresado',
            'cuerpo.required' => 'El cuerpo debe ser ingresado',
            'Id.required' => 'El Id debe ser Ingresado',
            //'email.email' => 'El correo debe tener un formato correcto',
        ];
    }
}
