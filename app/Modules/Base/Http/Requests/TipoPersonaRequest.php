<?php

namespace marygastro\Modules\Base\Http\Requests;

use marygastro\Http\Requests\Request;

class TipoPersonaRequest extends Request
{
    protected $reglasArr = [
        'nombre' => ['required', 'min:1', 'max:40']
    ];
}
