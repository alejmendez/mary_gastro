<?php

namespace App\Modules\Noticias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chicaRequest extends FormRequest
{
  protected $tabla = 'chica';
	protected $rules = [
		'titulo' => ['required', 'min:3', 'max:250'],
		'nombre' => ['required', 'min:3', 'max:250'],
		'url' => ['url'],
		'descripcion' => ['required'],
		'published_at' => ['date_format:"d/m/Y H:i"'],
		'archivo' => ['mimes:jpeg,jpg,png'],
	];

	public function rules(){
		return $this->reglas();
	}
}
