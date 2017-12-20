<?php

namespace marygastro\Modules\Pagos\Models;

use marygastro\Modules\Base\Models\Modelo;

class Planes extends modelo
{
    protected $table = 'planes';
    protected $fillable = ["nombre"];
    protected $campos = [
    'nombre' => [
        'type' => 'text',
        'label' => 'Nombre',
        'placeholder' => 'Nombre del Planes'
    ]
];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
        
    }   
}