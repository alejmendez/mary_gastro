<?php

namespace marygastro\Modules\Noticias\Http\Controllers;

use marygastro\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public $app = 'base';
    // public $autenticar = false;
    protected $titulo = 'Noticias';
    // public $prefijo_ruta = 'backend';

    protected $patch_js = [
        'public/js',
        'public/plugins',
        'app/Modules/Noticias/Assets/js',
    ];

    protected $patch_css = [
        'public/css',
        'public/plugins',
        'app/Modules/Noticias/Assets/css',
    ];
}
