<?php

namespace marygastro\Modules\Base\Http\Requests;

use marygastro\Http\Requests\Request;

class PerfilesRequest extends Request {
	protected $reglasArr = [
		'nombre' => ['required', 'nombre', 'min:3', 'max:50'],
	];
}