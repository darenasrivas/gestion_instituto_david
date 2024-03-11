<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProfesorRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    // decimos si permite hacerlo o no
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    // En rules, validamos los datos que nos dan. Posibles validaciones que podemos hacer

    public function rules(): array
    {
        return [
            "nombre"=>"required|min:5",
            "apellido"=>"required|min:5",
            "departamento"=>"required",
            "telefono"=>"required",
            "email"=>"email|required|unique:profesores",
            //
        ];
    }
}
