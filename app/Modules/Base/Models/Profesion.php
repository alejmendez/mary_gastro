<?php

namespace marygastro\Modules\Base\Models;

use marygastro\Modules\Base\Models\Modelo;

class Profesion extends modelo
{
    protected $table = 'profesion';
    protected $fillable = ["nombre","slug"];
    protected $campos = [
        'nombre' => [
            'type'        => 'text',
            'label'       => 'Nombre',
            'placeholder' => 'Nombre del Profesion'
        ]
    ];

    public function personadetalle()
    {
        return $this->hasOne('marygastro\Modules\Base\Models\PersonasDetalles', 'profesion_id');
    }
}