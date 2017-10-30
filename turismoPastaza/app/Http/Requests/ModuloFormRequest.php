<?php

namespace turismoPastaza\Http\Requests;

use turismoPastaza\Http\Requests\Request;

class ModuloFormRequest extends Request
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
            'nombre'=>'reuqerided|max:50',
            'descripcion'=>'max:100',

        ];
    }
}
