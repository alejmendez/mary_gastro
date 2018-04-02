<?php

namespace marygastro\Modules\Noticias\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoRequest extends FormRequest
{
    protected $tabla = 'video';
    protected $rules = [
    'titulo' => ['required', 'min:3', 'max:250'],
    'url' => ['required', 'min:11', 'max:11'],
    'descripcion' => ['required'],
    'published_at' => ['date_format:"d/m/Y H:i"']
  ];

    public function rules()
    {
        return $this->reglas();
    }
}
