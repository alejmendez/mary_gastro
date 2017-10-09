<?php

namespace marygastro\Modules\Base\Http\Requests;

use marygastro\Http\Requests\Request;

class MunicipioRequest extends Request {
    protected $reglasArr = [
		'estados_id' => ['integer'], 
		'nombre' => ['required', 'min:3', 'max:100']
	];
}