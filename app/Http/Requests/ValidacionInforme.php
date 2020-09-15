<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionInforme extends FormRequest
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
                "publicaciones" => "nullable|max:30",
                "videos" => "nullable|max:30",
                "horas" => "nullable|max:30",
                "revisitas" => "nullable|max:30",
                "estudios" => "nullable|max:30",
                "observaciones" => "nullable|max:100",
                "hermano_id" => "required|integer",
                "privilegio_id" => "required|array",
                "mes_id" => "required|integer",
                "año_id" => "required|integer",
            ];
        } else {
            return [
                "publicaciones" => "nullable|max:30",
                "videos" => "nullable|max:30",
                "horas" => "nullable|max:30",
                "revisitas" => "nullable|max:30",
                "estudios" => "nullable|max:30",
                "observaciones" => "nullable|max:100",
                "hermano_id" => "required|integer",
                "privilegio_id" => "required|array",
                "mes_id" => "required|integer",
                "año_id" => "required|integer",
                ];
    
            }
        }
}
