<?php

namespace marygastro\Modules\Cms\Http\Requests;

use marygastro\Http\Requests\Request;

class TestimoniosRequest extends Request {
    protected $reglasArr = [
		'titulo' => ['min:3', 'max:100'], 
		'descripcion' => ['min:3', 'max:100'], 
		'imagen' => ['required', 'min:3', 'max:100']
	];
}