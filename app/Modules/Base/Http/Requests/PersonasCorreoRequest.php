<?php

namespace marygastro\Modules\Base\Http\Requests;

use marygastro\Http\Requests\Request;

class PersonasCorreoRequest extends Request {
    protected $reglasArr = [
		'personas_id' => ['required', 'integer'], 
		'principal' => ['required'], 
		'cuenta' => ['required', 'min:3', 'max:200', 'unique:personas_correo,cuenta']
	];
}