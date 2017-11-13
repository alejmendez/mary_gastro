<?php
namespace marygastro\Modules\Noticias\Models;

use marygastro\Modules\Base\Models\Modelo;

class Tips extends Modelo
{
	protected $table = 'tips';
    protected $fillable = ["msj","titulo"];

    protected $campos = [
        'titulo' => [
            'type' => 'text',
            'label' => 'titulo',
            'placeholder' => 'titulo de la Etiqueta'
        ],
         'msj' => [
            'type'        => 'textarea',
            'label'       => 'Memsaje',
            'placeholder' => 'Memsaje',
            'cont_class'  => 'col-sm-12'
        ]
    ];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
       
    }
}