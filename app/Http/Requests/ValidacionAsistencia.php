<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidacionAsistencia extends FormRequest
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
                "reu_sem" => "nullable|max:50",
                "cant_reu" => "nullable|max:50",
                "reu_fin_sem" => "nullable|max:50",
                "cant_reu_fin" => "nullable|max:50",
                "mes_id" => "required|integer",
                "año_id" => "required|integer",
            ];
        } else {
            return [
                "reu_sem" => "nullable|max:50",
                "cant_reu" => "nullable|max:50",
                "reu_fin_sem" => "nullable|max:50",
                "cant_reu_fin" => "nullable|max:50",
                "mes_id" => "required|integer",
                "año_id" => "required|integer",
                ];
    
            }
        }
    }
