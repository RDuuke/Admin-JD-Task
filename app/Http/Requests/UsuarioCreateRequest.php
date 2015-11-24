<?php

namespace Task\Http\Requests;

use Task\Http\Requests\Request;

class UsuarioCreateRequest extends Request
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
            'username' => 'required|unique:users',
            'email' => 'required|unique:users',
            'documento' => 'required|unique:users',
            'name' => 'required',
            'telefono' => 'required',
            'password' => 'required|min:4',
        ];
    }
}