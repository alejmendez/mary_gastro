<?php

namespace  marygastro\Modules\Pagos\Http\Requests;

use  marygastro\Http\Requests\Request;

class BancoRequest extends Request
{
    protected $reglasArr = [
        'nombre_banco' => ['required', 'min:3', 'max:200']
    ];
}
