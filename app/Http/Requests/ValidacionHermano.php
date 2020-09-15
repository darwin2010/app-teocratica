<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionHermano extends FormRequest
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
        if ($this->route("id")) {
        return [
            "nombre" => "required|max:50",
            "direccion" => "nullable|max:100",
            "telefono" => "nullable|max:10",
            "celular" => "nullable|max:15",
            "email" => "nullable|email|max:100",
            "fecha_naci" => "nullable|max:50",
            "fecha_baut" => "nullable|max:50",
            "privilegio_id" => "required|array",
            "grupo_id" => "required|max:100",
            "estado_id" => "required|max:100",
            "publica_id" => "required|max:100",
        ];
    } else {
        return [
                "nombre" => "required|max:50",
                "direccion" => "nullable|max:100",
                "telefono" => "nullable|max:10",
                "celular" => "nullable|max:15",
                "email" => "nullable|email|max:100",
                "fecha_naci" => "nullable|max:50",
                "fecha_baut" => "nullable|max:50",
                "privilegio_id" => "required|array",
                "grupo_id" => "required|max:100",
                "estado_id" => "required|max:100",
                "publica_id" => "required|max:100",
            ];

        }
    }
}
