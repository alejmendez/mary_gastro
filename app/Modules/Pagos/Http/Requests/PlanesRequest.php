<?php

namespace marygastro\Modules\Pagos\Http\Requests;

use marygastro\Http\Requests\Request;

class PlanesRequest extends Request {
    protected $reglasArr = [
		'nombre' => ['required', 'min:3', 'max:200']
	];
}