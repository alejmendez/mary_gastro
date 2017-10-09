<?php

namespace marygastro\Modules\Noticias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImagenRequest extends FormRequest
{
  protected $tabla = 'imagenes';
	protected $rules = [
		'titulo' => ['required', 'min:3', 'max:250'],
		'descripcion' => ['required'],
		'published_at' => ['date_format:"d/m/Y H:i"'],
        'url'   =>  ['url']
	];
}
