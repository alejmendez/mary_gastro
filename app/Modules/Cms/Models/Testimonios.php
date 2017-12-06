<?php

namespace marygastro\Modules\Cms\Models;

use marygastro\Modules\Base\Models\Modelo;



class Testimonios extends modelo
{
    protected $table = 'testimonios';
    protected $fillable = ["titulo","descripcion","imagen"];
    protected $campos = [
        'titulo' => [
            'type' => 'text',
            'label' => 'Titulo',
            'placeholder' => 'Titulo del Testimonios',
            'cont_class' => 'col-xs-12'
        ],
        'descripcion' => [
            'type' => 'hidden'
        ],
        'imagen' => [
            'type' => 'text',
            'label' => 'Imagen',
            'placeholder' => 'Imagen del Testimonios'
        ]
    ];
}