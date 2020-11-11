<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsuariosRequest extends FormRequest
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
            'nombres'=>'required',
            'email'=>'required',

        ];
    }

    public function messages()
    {
        return [
            'nombres.required' => 'El nombre de usuario debe ser ingresado',
            'email.required' => 'El email debe ser Ingresado',
            //'email.email' => 'El correo debe tener un formato correcto',
        ];
    }
}
