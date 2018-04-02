<?php

namespace marygastro\Modules\Base\Models;

use marygastro\Modules\Base\Models\Modelo;

class TipoPersona extends modelo
{
    protected $table = 'tipo_persona';
    protected $fillable = ["nombre", "descripcion"];
    protected $campos = [
        'nombre' => [
            'type'        => 'text',
            'label'       => 'Nombre',
            'placeholder' => 'Nombre del Tipo Persona'
        ],
        'descripcion' => [
            'type'        => 'text',
            'label'       => 'Descripción',
            'placeholder' => 'Descripción del Tipo Persona'
        ]
    ];

    public function personas()
    {
        return $this->hasMany('marygastro\Modules\Base\Models\Personas', 'tipo_persona_id');
    }
}
