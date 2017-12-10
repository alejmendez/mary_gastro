<?php

namespace marygastro\Modules\Incidencias\Models;

use marygastro\Modules\Base\Models\Modelo;


class Incidencias extends modelo
{
    protected $table = 'incidencias';
    protected $fillable = ['personas_id','cierre', 'estatus', 'caso', 'descripcion','created_at'];
    protected $campos = [
        'caso' => [
            'type' => 'text',
            'label' => 'Titulo',
            'placeholder' => 'Titulo'
        ],
        'descripcion' => [
            'type'        => 'textarea',
            'label'       => 'Descripcion',
            'placeholder' => 'Descripcion',
            'cont_class'  => 'col-sm-12'
        ]
    ];
}