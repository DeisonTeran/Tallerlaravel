<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;


class UsuarioDestroyRequest extends FormRequest
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

            strlen('$email') => '0'
        ];
    }
    public function messages()
    {
        return [
            '$email.0' => 'La fecha de salida debe ser un campo requerido',
            'estado.required' => 'El Estado debe ser un campo requerido',
            'vehiculos_id.required' => 'El Vehiculo debe ser un campo requerido',
            //'email.email' => 'El correo debe tener un formato correcto',
        ];
        }
}
