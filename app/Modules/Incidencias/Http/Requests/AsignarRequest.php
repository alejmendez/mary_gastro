<?php

namespace marygastro\Modules\Incidencias\Http\Requests;

use marygastro\Http\Requests\Request;

class AsignarRequest extends Request {
    protected $reglasArr = [
		'consultas' => ['required', 'int']
	];
}