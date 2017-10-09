<?php

namespace marygastro\Modules\Pagina\Http\Requests;

use marygastro\Http\Requests\Request;
 
class ContactoRequest extends Request {
	protected $reglasArr = [
		'email'   => ['required', 'email', 'max:80'],
		'nombre'  => ['required', 'nombre', 'max:100'],
		'mensaje' => ['required']
	];

	public function authorize() {
		return true;
	}
}