<?php

namespace turismoPastaza\Http\Requests;

use turismoPastaza\Http\Requests\Request;

class RecursoFormRequest extends Request
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
            'ID_SITIO'=>'required',
            'ID_SERVICIO',
            'PATH'=>'required|max:200',
            'DESCRIPCION'=>'max:100'

        ];
    }
}
