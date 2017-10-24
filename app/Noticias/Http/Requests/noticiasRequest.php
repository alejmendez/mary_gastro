<?php

namespace marygastro\Modules\Noticias\Http\Requests;

use marygastro\Http\Requests\Request;

class noticiasRequest extends Request {
    protected $reglasArr = [
        'titulo' 			=> ['required', 'min:3', 'max:250'],
        'slug'				=> ['required'],
        'contenido_html' 	=> ['required'],
        'resumen' 			=> ['required'],
        'archivos'              => ['required'],
        'published_at' 		=> [''],
    ];
}
