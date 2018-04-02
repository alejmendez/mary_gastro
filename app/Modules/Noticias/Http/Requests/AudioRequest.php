<?php

namespace marygastro\Modules\Noticias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AudioRequest extends FormRequest
{
    protected $tabla = 'audio';
    protected $rules = [
    'titulo' => ['required', 'min:3', 'max:250'],
    'descripcion' => ['required'],
    'url' => ['required', 'min:3', 'max:500'],
    'published_at' => ['required']
  ];

    public function rules()
    {
        return $this->reglas();
    }
}
