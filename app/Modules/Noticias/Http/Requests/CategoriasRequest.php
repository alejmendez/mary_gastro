<?php

namespace marygastro\Modules\Noticias\Http\Requests;

use marygastro\Http\Requests\Request;

class CategoriasRequest extends Request {
    protected $reglasArr = [
		'nombre' => ['required', 'min:3', 'max:60'],
        'slug' => ['required', 'min:3', 'max:250'],
		'descripcion' => ['required', 'min:3', 'max:250'],
        'color' => ['required', 'min:3','max:25']
	];
}
