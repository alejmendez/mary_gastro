<?php

namespace marygastro\Modules\Incidencias\Http\Controllers;

use marygastro\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    public $app = 'base';

    protected $patch_js = [
        'public/js',
        'public/plugins',
        'app/Modules/Incidencias/Assets/js',
    ];

    protected $patch_css = [
        'public/css',
        'public/plugins',
        'app/Modules/Incidencias/Assets/css',
    ];
}
