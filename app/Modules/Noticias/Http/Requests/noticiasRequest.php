<?php

namespace marygastro\Modules\Noticias\Http\Requests;

use marygastro\Http\Requests\Request;

class noticiasRequest extends Request {
    protected $reglasArr = [
        'categorias_id'     => ['required'],
        'titulo' 			=> ['required', 'min:3', 'max:250'],
        'slug'				=> ['required'],
        'contenido_html' 	=> ['required'],
        'resumen' 			=> ['required'],
        'published_at' 		=> [''],
    ];
}
