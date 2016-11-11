<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PersonaRequest extends Request
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
        return ['nombre' => 'required|max:50',
                'ap_paterno' => 'required|max:50',
                'ap_materno' => 'required|max:50',
                'documento_identidad' => 'required|max:10',
                'tipo_documento' => 'required|max:4',
                'genero' => 'required|max:3',
            //
        ];
    }
}
