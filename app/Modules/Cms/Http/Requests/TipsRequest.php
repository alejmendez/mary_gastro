<?php

namespace marygastro\Modules\Cms\Http\Requests;

use marygastro\Http\Requests\Request;

class TipsRequest extends Request {
    protected $reglasArr = [
		'titulo' => ['min:3', 'max:100'], 
		'descripcion' => ['min:3', 'max:100']
	];
}