<?php

namespace marygastro\Modules\Base\Http\Requests;

use marygastro\Http\Requests\Request;

class ProfesionRequest extends Request
{
    protected $reglasArr = [
        'nombre' => ['required', 'min:3', 'max:100']
    ];
}
