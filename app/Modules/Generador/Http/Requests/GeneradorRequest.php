<?php

namespace marygastro\Modules\Generador\Http\Requests;

use marygastro\Http\Requests\Request;

class GeneradorRequest extends Request {
	protected $reglasArr = [
		'modulo'	=> ['required', 'min:3'],
		'tabla'		=> ['regex:/^[a-zA-Z0-9_]+$/', 'min:3'],
		'nombre'	=> []
	];
}