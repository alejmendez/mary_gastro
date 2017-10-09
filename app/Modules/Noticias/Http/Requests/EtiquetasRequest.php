<?php

namespace Modules\Noticias\Http\Requests;

use marygastro\Http\Requests\Request;

class EtiquetasRequest extends Request {
    protected $reglasArr = [
		'nombre' => ['string', 'min:3', 'max:60'],
		'slug' => ['required', 'min:3', 'max:250', 'unique:etiquetas,slug'],
		'descripcion' => ['required']
	];
}
