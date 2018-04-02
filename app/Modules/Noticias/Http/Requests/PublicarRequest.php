<?php

namespace marygastro\Modules\Noticias\Http\Requests;

use marygastro\Http\Requests\Request;

class PublicarRequest extends Request
{
    protected $reglasArr = [
        'published_at' => ['required', 'date_format:"d/m/Y H:i"']
    ];
}
