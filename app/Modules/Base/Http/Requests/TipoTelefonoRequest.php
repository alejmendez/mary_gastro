<?php

namespace marygastro\Modules\Base\Http\Requests;

use marygastro\Http\Requests\Request;

class TipoTelefonoRequest extends Request {
    protected $reglasArr = [
		'nombre' => ['required', 'min:3', 'max:100']
	];
}