<?php

namespace marygastro\Modules\Base\Http\Requests;

use marygastro\Http\Requests\Request;

class BancosRequest extends Request {
    protected $reglasArr = [
		'banco' => ['required', 'min:3', 'max:80'], 
		'tipo_cuenta' => ['required', 'min:3', 'max:80'], 
		'cuenta' => ['required', 'min:3', 'max:80'], 
		'nombre' => ['required', 'min:3', 'max:80'], 
		'cedula' => ['required', 'min:3', 'max:80'], 
		'correo' => ['required', 'min:3', 'max:80']
	];
}