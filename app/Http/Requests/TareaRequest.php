<?php

namespace Task\Http\Requests;

use Task\Http\Requests\Request;

class TareaRequest extends Request
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
            'tiempo' => 'required',
            'descripcion' => 'required',
            'fecha_tarea'=> 'required',
            'cliente_id' => 'required',
        ];
    }
}