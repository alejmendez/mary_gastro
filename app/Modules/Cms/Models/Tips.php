<?php

namespace marygastro\Modules\Cms\Models;

use marygastro\Modules\Base\Models\Modelo;

class Tips extends modelo
{
    protected $table = 'tips';
    protected $fillable = ["titulo","descripcion"];
    protected $campos = [
        'titulo' => [
            'type' => 'text',
            'label' => 'Titulo',
            'placeholder' => 'Titulo del Tips',
            'cont_class' => 'col-xs-12'
        ],
        'descripcion' => [
            'type' => 'textarea',
            'label' => 'Descripcion',
            'placeholder' => 'Descripcion del Tips',
            'cont_class' => 'col-xs-12'
        ]
    ];
}