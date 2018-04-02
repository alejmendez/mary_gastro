<?php

namespace  marygastro\Modules\Pagos\Models;

use  marygastro\Modules\Base\Models\Modelo;

class Banco extends modelo
{
    protected $table = 'banco';
    protected $fillable = ["nombre_banco"];
    protected $campos = [
    'nombre_banco' => [
        'type' => 'text',
        'label' => 'Nombre Banco',
        'placeholder' => 'Nombre Banco del Banco'
    ]
];

    public function __construct(array $attributes = array())
    {
        parent::__construct($attributes);
    }
}
