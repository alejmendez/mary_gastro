<?php

namespace marygastro\Modules\Noticias\Http\Requests;

use marygastro\Http\Requests\Request;

class EstatusRequest extends Request
{
    protected $reglasArr = [
        'nombre' => ['required', 'min:3', 'max:50', 'unique:estatus,nombre']
    ];
}
